<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Paciente;
use App\Http\Middleware\Utils;
use App\NextDate;

class DateController extends Controller
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
    public function addTreatment(Request $request)
    {
        $inputs = $request->all();
        $rules = [
            'next_date' => 'required|gttoday',
        ];
        $messages = [
            'next_date.required' => 'Debe indicar la fecha de la siguiente visita.',
            'next_date.gttoday' => 'La fecha debe ser superior al día de hoy.',
        ];
        Validator::extend('gttoday', function(){
            return Utils::gtToday($_REQUEST['next_date']);
        });
        $validator = Validator::make($request->all(),$rules,$messages);
        //if something is wrong
        if ($validator->fails()){
            $pacient = new Paciente;
            $pacient = $pacient->find($inputs['paciente_id']);
            return redirect('/main')->withErrors($validator)->withInput()->with(array('pacient' => $pacient));
        } else {
            $nextDate = new NextDate();
            $nextDate = $nextDate->create($inputs);
            if ($nextDate) {
                $pacient = new Paciente;
                $pacient = $pacient->find($inputs['paciente_id']);
                if ($pacient->getAttribute('id')) {
                    $nextDate->paciente()->associate($pacient)->save();
                    $pacient->revisions()->save($nextDate);
                    if (session('reminder')) $request->session()->forget('reminder');
                }
                return redirect()->route('main')->with(['pacient' => $pacient, 'message' => 'Siguiente cita para ' . $inputs['treatment'] . ' creada.' ]);
            } else {
                return redirect()->back()->withErrors(['Error creando la siguiente cita para' . $inputs['treatment'] . '!!!']);
            }
        }
    }
}
