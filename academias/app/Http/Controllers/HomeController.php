<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academias;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countAcademias = Academias::count();
        $countUsuarios = User::count();
        return view('home',compact(['countAcademias','countUsuarios']));
    }
}
