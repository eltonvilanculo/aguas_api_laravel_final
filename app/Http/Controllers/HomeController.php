<?php

namespace App\Http\Controllers;

use App\Models\LinkReading;
use App\Models\User;
use App\Models\Zona as Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


    //    Temp code

    // $user = User::where('username','=',$request->username)->first();
    $zones = Zone::all();
    $users = User::all();


    $links =  LinkReading::with(['zone','user'])->latest()->get();




        return view('home',compact('zones','users','links'));
    }
}
