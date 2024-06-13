<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Checkout\CreateRequest;
use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details', 'travelPackage', 'user'])->findOrFail($id);
        return view('pages.checkout', compact('item'));
    }

    public function process(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $travelPackage = TravelPackage::findOrFail($id);
            $user = User::find(Auth::user()->id);

            $transaction = new Transaction();
            $transaction->additional_visa = 0;
            $transaction->transaction_total = $travelPackage->price;
            $transaction->transaction_status = 'IN_CART';
            $transaction->user()->associate($user);
            $transaction->travelPackage()->associate($travelPackage);
            $transaction->save();

            $transactionDetail = new TransactionDetail();
            $transactionDetail->username = $user->username;
            $transactionDetail->nationality = 'ID';
            $transactionDetail->is_visa = false;
            $transactionDetail->doe_passport = Carbon::now()->addYears(5);
            $transactionDetail->transaction()->associate($transaction);
            $transactionDetail->save();

            DB::commit();

            return redirect()->route('checkout', $transaction->id);
        } catch (Exception $error) {
            DB::rollBack();
            app('sentry')->captureException($error);
            return redirect()
                ->back()
                ->with('error', 'Telah terjadi kesalahan');
        }
    }

    public function remove(Request $request, $detailId)
    {
        $item = TransactionDetail::findOrFail($detailId);
        $transaction = Transaction::with(['details', 'travelPackage'])->findOrFail($item->transaction_id);

        if ($item->is_visa) {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travelPackage->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $transaction->id);
    }

    public function create(CreateRequest $request, $id)
    {
        $data = $request->all();
        $data['transaction_id'] = $id;

        $transactionDetail = new TransactionDetail();
        $transactionDetail->fill($data);
        $transactionDetail->save();

        $transaction = Transaction::with(['travelPackage'])->find($id);

        if ($request->is_visa) {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travelPackage->price;
        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';
        $transaction->save();
        
        return view('pages.checkout-success');
    }
}
