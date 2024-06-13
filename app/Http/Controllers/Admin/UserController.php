<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->roles) {
            $roles = $request->roles;
            $users = User::whereIn('roles', $roles)->get();
        } else {
            $users = User::all();
        }
        return view('pages.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            $user = new User();
            $user->roles = 'ADMIN';
            $user->fill($data);
            $user->save();

            return redirect()
                ->route('user.index')
                ->with('success', 'User berhasil ditambah');
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()
                ->back()
                ->with('error', 'User gagal ditambah, telah terjadi kesalahan pada server');
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
        $user = User::findOrFail($id);
        return view('pages.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $data = $request->all();

            if ($data['password'] == '') {
                unset($data['password']);
            } else {
                $data['password'] = Hash::make($data['password']);
            }

            $user = User::findOrFail($id);
            $user->fill($data);
            $user->save();

            return redirect()
                ->route('user.index')
                ->with('success', 'User berhasil diedit');
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()
                ->back()
                ->with('error', 'User gagal diedit, telah terjadi kesalahan pada server');
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
            $user = User::find($id);
            $user->delete();
            return redirect()
                ->back()
                ->with('success', 'User berhasil dihapus');
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()
                ->back()
                ->with('error', 'User gagal dihapus, telah terjadi kesalahan pada server');
        }
    }
}
