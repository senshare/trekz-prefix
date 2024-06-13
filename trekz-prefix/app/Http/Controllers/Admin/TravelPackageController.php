<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\TravelPackage;
use Exception;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TravelPackage::all();
        return view('pages.admin.travel-package.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        try {
            $data = $request->all();
            $data['slug'] = Str::slug($data['title']);

            $travel = new TravelPackage();
            $travel->title = $data['title'];
            $travel->slug = $data['slug'];
            $travel->location = $data['location'];
            $travel->about = $data['about'];
            $travel->featured_event = $data['featured_event'];
            $travel->language = $data['language'];
            $travel->foods = $data['foods'];
            $travel->departure_date = $data['departure_date'];
            $travel->duration = $data['duration'];
            $travel->type = $data['type'];
            $travel->price = $data['price'];
            $travel->save();

            return redirect()
                ->route('travel-package.index')
                ->with('success', 'Travel berhasil ditambah');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', 'Travel gagal ditambah, telah terjadi kesalahan pada server');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TravelPackage::findOrFail($id);
        return view('pages.admin.travel-package.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['slug'] = Str::slug($data['title']);

            $travel = TravelPackage::find($id);
            $travel->title = $data['title'];
            $travel->slug = $data['slug'];
            $travel->location = $data['location'];
            $travel->about = $data['about'];
            $travel->featured_event = $data['featured_event'];
            $travel->language = $data['language'];
            $travel->foods = $data['foods'];
            $travel->departure_date = $data['departure_date'];
            $travel->duration = $data['duration'];
            $travel->type = $data['type'];
            $travel->price = $data['price'];
            $travel->save();

            return redirect()
                ->route('travel-package.index')
                ->with('success', 'Travel berhasil diedit');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', 'Travel gagal diedit, telah terjadi kesalahan pada server');
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
            $travel = TravelPackage::find($id);
            $travel->delete();
            return redirect()
                ->back()
                ->with('success', 'Travel berhasil dihapus');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', 'Travel gagal dihapus, telah terjadi kesalahan pada server');
        }
    }
}
