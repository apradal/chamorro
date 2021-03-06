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
        $id = $request->input('id');
        $name = $request->input('pacient');
        if (session('pacient')) { //redirecting from created user
            return view('periodontics.card')->with(array('pacient' => session('pacient'), 'card' => session('pacient')->fichaperiodontal));
        } elseif (isset($id) || isset($name)) { //search from pediodontal card
            $pacient = new Paciente;
            $pacient = $pacient->find($id);
            if ($pacient) {
                return view('periodontics.card')->with(array('pacient' => $pacient, 'card' => $pacient->fichaperiodontal));
            } elseif (isset($name)) {
                $pacient = new Paciente;
                $name = str_replace(' ','', $name);
                if ($pacient = $pacient->getPacientByFullName($name)) {
                    return view('periodontics.card')->with(array('pacient' => $pacient, 'card' => $pacient->fichaperiodontal));
                } else {
                    return view('periodontics.card')->withErrors(['El paciente ' . $name . ' no existe ne la base de datos']);
                }
            }
        } else {
            return view('periodontics.card');
        }
    }

    public function update(Request $request)
    {
        $pacient_id = $request->input('pacient_id_card');

        if (!isset($pacient_id)) return redirect()->back()->withErrors(['Debes buscar un paciente antes de modificar una ficha.']);
        $pacient = new Paciente;
        $pacient = $pacient->find($pacient_id);
        if ($pacient->id) {
            $card = $pacient->fichaperiodontal;
            $card = $card->updateCard($request->all());
            if ($card) {
                return redirect()->route('main')->with(['pacient' => $pacient, 'message' => 'Ficha pediorontal actualizada']);
            }
        }

        return false;

    }


}
