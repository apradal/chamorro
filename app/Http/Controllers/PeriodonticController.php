<?php

namespace App\Http\Controllers;

use App\FichaPeriodontal;
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
        if (session('pacient')) { //redirecting from created user
            return view('periodontics.card')->with(array('pacient' => session('pacient'), 'card' => session('pacient')->fichaperiodontal));
        } elseif (isset($id) && isset($name)){ //search from perdidontal card
            $pacient = new Paciente;
            $pacient = $pacient->find($id);
            return view('periodontics.card')->with(array('pacient' => $pacient, 'card' => $pacient->fichaperiodontal));
        } elseif (!isset($id) && isset($name)) { //search from pediodontal card but not clicking on results given by ajax
            $pacient = new Paciente;
            $name = str_replace(' ','', $name);
            if ($pacient = $pacient->getPacientByFullName($name)) {
                return view('periodontics.card')->with(array('pacient' => $pacient, 'card' => $pacient->fichaperiodontal));
            } else {
                return view('periodontics.card');
            }
        } else {
            return view('periodontics.card');
        }
    }

    public function update(Request $request)
    {
        $pacient_id = $request->input('pacient_id_card');

        $pacient = new Paciente;
        $pacient = $pacient->find($pacient_id);
        if ($pacient->id) {
            $card = $pacient->fichaperiodontal;
            $card = $card->updateCard($request->all());
            if ($card) {
                //TODO, comprobar si ha cxargado paciente y si no redirect error. si guarda redirect a nueva pagína
                return redirect()->route('card')->with('message', 'Ficha creada o actualizada');
            }
        }

    }


}
