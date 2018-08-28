<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Paciente;
use App\Cuadrante;

class CuadranteController extends Controller
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
    public function add(Request $request)
    {
        $inputs = $request->all();
        $rules = [
            'pattern' => 'required',
            'date' => 'required',
        ];
        $messages = [
            'pattern.required' => 'Debe seleccionar cuadrante.',
            'date.required' => 'Debe indicar fecha de cuadrante.'

        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        //if something is wrong
        if ($validator->fails()){
            return redirect('/main')->withErrors($validator)->withInput();
        } else {
            $cuadrante = new Cuadrante;
            $cuadrante = $cuadrante->create($inputs);
            if ($cuadrante) {
                $pacient = new Paciente;
                $pacient = $pacient->find($inputs['paciente_id']);
                if ($pacient->getAttribute('id')) {
                    $cuadrante->paciente()->associate($pacient)->save();
                    $pacient->cuadrantes()->save($cuadrante);
                }
                //TODO redirect a main con mensaje y paciente, una vez en main cargar todo del usuario.
                return redirect()->route('main')->with('pacient', $pacient);
            } else {
                return redirect()->back()->withErrors(['El cuadrante ha dado error!']);
            }
        }
    }
}
