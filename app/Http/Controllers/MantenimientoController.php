<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Paciente;
use App\Mantenimiento;

class MantenimientoController extends Controller
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
            'date' => 'required',
        ];
        $messages = [
            'date.required' => 'Debe indicar fecha de mantenimiento.'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        //if something is wrong
        if ($validator->fails()){
            return redirect('/main')->withErrors($validator)->withInput();
        } else {
            $mantenimiento = new Mantenimiento;
            $mantenimiento = $mantenimiento->create($inputs);
            if ($mantenimiento) {
                $pacient = new Paciente;
                $pacient = $pacient->find($inputs['paciente_id']);
                if ($pacient->getAttribute('id')) {
                    $mantenimiento->paciente()->associate($pacient)->save();
                    $pacient->mantenimientos()->save($mantenimiento);
                }
                return redirect()->route('main')->with(['pacient' => $pacient, 'message' => 'Mantenimiento creada con éxito.']);
            } else {
                return redirect()->back()->withErrors(['Error en el mantenimiento   !']);
            }
        }
    }
}
