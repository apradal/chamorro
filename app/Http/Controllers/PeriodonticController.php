<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class PeriodonticController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('periodontics');
    }

    public function card()
    {
        if (session('pacient')) {
            return view('periodontics.card')->with('pacient', session('pacient'));
        } else {
            return view('periodontics.card');
        }
    }


}
