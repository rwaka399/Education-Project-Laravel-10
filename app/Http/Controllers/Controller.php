<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;


class Controller extends BaseController
{
    public function index() {
        return view ('index');
    }

    public function home() {
        $data = User::get();

        return view('home', compact('data'));
    }

    public function user() {
        $data = User::get();


        return view('user.user', compact('data'));
    }

    // CRUD CRUD CRUD CRUD CRUD
    public function create() {
        return view('user.create');
    }

    public function newUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|unique:users,email',
            'name'      => 'required',
            'password'  => 'required',
        ]);
    
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        $data = [
            'email'     => $request->email,
            'name'      => $request->name,
            'password'  => bcrypt($request->password),
        ];
    
        User::create($data);
    
        return redirect()->route('user');
    }

    public function edit(Request $request,$id) {
        $data = User::find($id);

        return view('user.edit', compact('data'));
    }

    public function update(Request $request,$id) {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|unique:users,email',
            'name'      => 'required',
            'password'  => 'nullable',
        ]);
    
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        $data = [
            'email'     => $request->email,
            'name'      => $request->name,
        ];

        if($request->password){
            $data['password'] = bcrypt($request->passowrd);
        }
    
        User::whereId($id)->update($data);
    
        return redirect()->route('user');
    }

    public function delete($id) {
        $data = User::find($id);
        $data->delete();

        return redirect()->route('user.user');
    }

    // END CRUD CRUD CRUD CRUD CRUD

    

    

}
