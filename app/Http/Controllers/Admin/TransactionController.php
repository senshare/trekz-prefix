<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Transaction;
use Exception;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transaction::with(['details', 'travelPackage', 'user'])->get();
        return view('pages.admin.transaction.index', compact('items')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::with(['details', 'travelPackage', 'user'])->findOrFail($id);
        return view('pages.admin.transaction.detail', compact('item'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);
        return view('pages.admin.transaction.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        try {
            $transaction = Transaction::find($id);
            $transaction->transaction_status = $request->transaction_status;
            $transaction->save();

            return redirect()
                ->route('transaction.index')
                ->with('success', 'Transaksi berhasil diedit');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', 'Transaksi gagal diedit, telah terjadi kesalahan pada server');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $travel = Transaction::find($id);
            $travel->delete();
            return redirect()
                ->back()
                ->with('success', 'Transaksi berhasil dihapus');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', 'Transaksi gagal dihapus, telah terjadi kesalahan pada server');
        }
    }
}
