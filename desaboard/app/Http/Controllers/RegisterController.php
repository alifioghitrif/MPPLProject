<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title' => 'Register'
        ]);
        
    }
    public function store(Request $request){
        // return request()->all();
        $validatedData = $request -> validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        // $request->session()->flash('success', 'Akun berhasil dibuat, silahkan login');
        return redirect('/login')->with('success', 'Akun berhasil dibuat, silahkan login');
    }
}
