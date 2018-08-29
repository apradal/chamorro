<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Paciente;
use App\Revision;

class RevisionController extends Controller
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
            'date.required' => 'Debe indicar fecha de cuadrante.'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        //if something is wrong
        if ($validator->fails()){
            return redirect('/main')->withErrors($validator)->withInput();
        } else {
            $revision = new Revision;
            $revision = $revision->create($inputs);
            if ($revision) {
                $pacient = new Paciente;
                $pacient = $pacient->find($inputs['paciente_id']);
                if ($pacient->getAttribute('id')) {
                    $revision->paciente()->associate($pacient)->save();
                    $pacient->cuadrantes()->save($revision);
                }
                //TODO redirect a main con mensaje y paciente, una vez en main cargar todo del usuario.
                return redirect()->route('main')->with(['pacient' => $pacient, 'message' => 'Revisión creada con éxito.']);
            } else {
                return redirect()->back()->withErrors(['Error en la revisión!']);
            }
        }
    }
}
