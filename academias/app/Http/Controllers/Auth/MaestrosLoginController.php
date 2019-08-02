<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class MaestrosLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:maestros');
    }

    public function showLoginForm()
    {
        return view('auth.maestrosLogin');
    }
    
    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
            /*'name' => 'required|string|max:100',
            'apellidoPaterno' => 'require',
            'apellidoMaterno' => 'require',
            'telefono' => 'require|min:10|max:15',
            'email' => 'required|email|unique:maestros',
            'password' => 'require|min:8',
            'Foto' => 'required|max:1000|mimes:jpeg,jpg,png'*/
        ]);

      

        //Attemp to log the user in-
        if (Auth::guard('maestros')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If succesfull, then redirect to their intended location
            return redirect()->intended(route('maestros.dashboard'));
        }

        // If unsuccesfull, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email','remember'));
    }

}
