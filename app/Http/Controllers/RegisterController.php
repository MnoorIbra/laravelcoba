<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function index(){
      return view('register.index', [
          'title' => 'Register'
      ]); 
    }



    public function store(Request $request){
      

     $validateData = $request->validate([
        'name' => 'required|max:255',
        'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:30'
      ]);

      //enkripsi password di my sql
      $validateData['password'] = bcrypt($validateData['password']);


      //$request->session()->flash('success', 'Registrasi selesai, silahkan login');

      User::create($validateData);
      
      

      return redirect('/login')->with('success', 'Registrasi selesai, silahkan login');
    }
}
