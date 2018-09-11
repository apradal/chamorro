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
                    return view('periodontics.card')->with(array('pacient' => $pacient, 'card' => $pacient->fichaperiodontal));
                } else {
                    return view('periodontics.card')->withErrors(['El paciente ' . $name . ' no existe ne la base de datos']);
                }
            }
        } else {
            return view('main');
        }
    }

    public static function groupTreatments($pacient)
    {
        $main = new MainController();
        return $main->orderTreatments($pacient);

    }

    private function orderTreatments($pacient)
    {
        $orderedTreatmens = array();

        if (count($pacient->cuadrantes->all()) > 0) {
            foreach ($pacient->cuadrantes as $cuadrante) {
                $orderedTreatmens[] = array(
                    'pattern' => $cuadrante->getAttribute('pattern'),
                    'date' => $cuadrante->getAttribute('date'),
                    'observations' => $cuadrante->getAttribute('observations'),
                    'treatment' => 'cuadrante'
                );
            }
        }
        if (count($pacient->limpiezas->all()) > 0) {
            foreach ($pacient->limpiezas as $limpieza) {
                $orderedTreatmens[] = array(
                    'date' => $limpieza->getAttribute('date'),
                    'observations' => $limpieza->getAttribute('observations'),
                    'treatment' => 'limpieza'
                );
            }
        }
        if (count($pacient->revisions->all()) > 0) {
            foreach ($pacient->revisions as $revision) {
                $orderedTreatmens[] = array(
                    'date' => $revision->getAttribute('date'),
                    'observations' => $revision->getAttribute('observations'),
                    'treatment' => 'revision'
                );
            }
        }
        if (count($pacient->mantenimientos->all()) > 0) {
            foreach ($pacient->mantenimientos as $mantenimiento) {
                $orderedTreatmens[] = array(
                    'date' => $mantenimiento->getAttribute('date'),
                    'observations' => $mantenimiento->getAttribute('observations'),
                    'treatment' => 'mantenimiento'
                );
            }
        }

        usort($orderedTreatmens, function ($a, $b) {
            return $a['date'] <= $b['date'];
        });

        if (count($orderedTreatmens) > 0) $orderedTreatmens[0]['class'] = 'list-active';

        return $orderedTreatmens;
    }
}
