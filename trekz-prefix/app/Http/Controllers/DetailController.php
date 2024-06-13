<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $travel = TravelPackage::slug($slug)->withGalleries()->firstOrFail();
        return view('pages.detail', compact('travel'));
    }
}
