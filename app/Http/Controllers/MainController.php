<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;

class MainController extends Controller
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
    public function index(Request $request)
    {
        $name = $request->input('pacient');
        if (session('pacient')) { //redirecting from ficha periodontal
            return view('main')->with(array('pacient' => session('pacient')));
        } elseif (isset($name)) { //search from input
            $pacient = new Paciente;
            $name = str_replace(' ','', $name);
            if ($pacient = $pacient->getPacientByFullName($name)) {
                return view('main')->with(array('pacient' => $pacient));
            } else {
                return view('main')->withErrors(['El paciente ' . $name . ' no existe ne la base de datos']);
            }
        } else {
            return view('main');
        }
    }
}
