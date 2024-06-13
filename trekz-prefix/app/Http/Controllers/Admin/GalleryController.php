<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Gallery;
use App\TravelPackage;
use Exception;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::with('travelPackage')->get();
        return view('pages.admin.gallery.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travels = TravelPackage::all();
        return view('pages.admin.gallery.create', compact('travels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        try {
            $data = $request->all();
            $data['image'] = $request->file('image')->store('assets/gallery', 'public');

            $image = new Gallery();
            $image->travel_packages_id = $data['travel_packages_id'];
            $image->image = $data['image'];
            $image->save();

            return redirect()
                ->route('gallery.index')
                ->with('success', 'Galeri berhasil ditambah');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', 'Galeri gagal ditambah, telah terjadi kesalahan pada server');
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
        $item = Gallery::findOrFail($id);
        $travels = TravelPackage::all();
        return view('pages.admin.gallery.edit', compact('item', 'travels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['image'] = $request->file('image')->store('assets/gallery', 'public');

            $image = Gallery::findOrFail($id);
            $image->travel_packages_id = $data['travel_packages_id'];
            $image->image = $data['image'];
            $image->save();

            return redirect()
                ->route('gallery.index')
                ->with('success', 'Galeri berhasil diedit');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', 'Galeri gagal diedit, telah terjadi kesalahan pada server');
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
            $gallery = Gallery::find($id);
            $gallery->delete();
            return redirect()
                ->back()
                ->with('success', 'Galeri berhasil dihapus');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', 'Galeri gagal dihapus, telah terjadi kesalahan pada server');
        }
    }
}
