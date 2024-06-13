<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\TravelPackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $travelPackages = TravelPackage::count();
        $transactions = Transaction::count();
        $transactionPending = Transaction::pending()->count();
        $transactionSuccess = Transaction::success()->count();
        
        return view('pages.admin.dashboard', compact(
            'travelPackages', 'transactions', 'transactionPending', 'transactionSuccess'
        ));
    }
}
