<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Paciente;
use App\FichaPeriodontal;

class PacientController extends Controller
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
    public function newPacient()
    {
        return view('pacients.new');
    }

    public function createPacient(Request $request)
    {
        $inputs = $request->all();
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|integer'
        ];
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'lastname.required' => 'El apellido es obligatorio.',
            'phone.required' => 'El teléfono es obligatorio.',
            'phone.integer' => 'El teléfono debe ser numérico.'

        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        //if something is wrong
        if ($validator->fails()){
            return redirect('/pacients/new')->withErrors($validator)->withInput();
        } else {
            $pacient = new Paciente;
            $pacient = $pacient->create($inputs);
            if ($pacient) {
                //TODO una vez que ya comprobamos, sacar para crear la ficha.
                $card = new FichaPeriodontal;
                $card->paciente()->associate($pacient);
                $card->save();
                return redirect()->route('card')->with('pacient', $pacient);
            } else {
                return redirect()->back()->withErrors(['El paciente ' . $inputs['name'] . ' ' . $inputs['lastname'] . ' Ya existe!']);
            }
        }
    }
}
