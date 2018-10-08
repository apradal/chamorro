<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Limpieza;
use App\Cuadrante;
use App\Revision;
use App\Mantenimiento;

class TreatmentController extends Controller
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


    public function updateTreatmentAjax(Request $request)
    {
        $params = $request->all();
        $object = null;
        switch ($params['type']) {
            case ('limpieza'):
                $object = new Limpieza();
                break;
            case ('mantenimiento'):
                $object = new Mantenimiento();
                break;
            case ('cuadrante'):
                $object = new Cuadrante();
                break;
            case ('revision'):
                $object = new Revision();
                break;
        }

        $object = $object->find($params['id']);
        if ($object) {
            try {
                $object->update(array('observations' => $params['content']));
                return response()->json(['success' => true]);
            }catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()]);
            }
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('pacient');
        if (session('pacient')) { //redirecting from ficha periodontal
            return view('main')->with(array('pacient' => session('pacient')));
        } elseif (isset($id) || isset($name)) { //search from input
            $pacient = new Paciente;
            $pacient = $pacient->find($id);
            if ($pacient) {
                return view('main')->with(array('pacient' => $pacient));
            } elseif (isset($name)) {
                $pacient = new Paciente;
                $name = str_replace(' ','', $name);
                if ($pacient = $pacient->getPacientByFullName($name)) {
                    return view('main')->with(array('pacient' => $pacient, 'card' => $pacient->fichaperiodontal));
                } else {
                    return view('main')->withErrors(['El paciente ' . $name . ' no existe ne la base de datos']);
                }
            }
        } else {
            return view('main');
        }
    }
}
