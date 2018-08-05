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

    /**
     * Redirects to card page with all posible cases.
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function card(Request $request)
    {
        $id = $request->input('pacient_id');
        $name = $request->input('pacient');
        if (session('pacient')) {
            return view('periodontics.card')->with('pacient', session('pacient'));
        } elseif (isset($id) && isset($name)){
            $pacient = new Paciente;
            return view('periodontics.card')->with('pacient', $pacient->find($id));
        } elseif (!isset($id) && isset($name)) {
            $pacient = new Paciente;
            $name = str_replace(' ','', $name);
            if ($pacient = $pacient->getPacientByFullName($name)) {
                return view('periodontics.card')->with('pacient', $pacient);
            } else {
                return view('periodontics.card');
            }
        } else {
            return view('periodontics.card');
        }
    }


}
