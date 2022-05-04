<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user_login = Auth::user()->id;
        $user = User::select('id', 'name', 'gender', 'address', 'email', 'phone_number', 'created_at', 'updated_at')
                ->where('id', '!=', $id_user_login)
                ->orderBy('name', 'asc')
                ->get();
        return view('layouts.user.index', ['users' => $user->toArray()]);
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
    public function store(Request $request)
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
        // dd($user->toArray());

        return view('layouts.user.edit', ['user' => $user->toArray()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data_user_change = $request->all();
        // dd($id, $request->all());
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone');
        if (!is_null($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->updated_at = Carbon::now()->toDateTimeString();
        $user->update();
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('user');
    }
}
