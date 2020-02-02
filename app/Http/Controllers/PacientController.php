<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Paciente;
use App\FichaPeriodontal;

class PacientController extends Controller
{
    protected $pacient = null;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->pacient = new Paciente;
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

    public function editPagePacient(Request $request) {
        $data = $request->all();
        $rules = [
            'id' => 'required'
        ];
        $messages = [
            'id.required' => 'Es obligatorio indicar paciente'

        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        //if something is wrong
        if ($validator->fails()){
            return redirect('/pacients/new')->withErrors($validator)->withInput();
        } else {
            $pacient = new Paciente;
            $pacient = $pacient->find($data['id']);
            if ($pacient) {
                return view('pacients.edit')->with('pacient', $pacient);
            }
        }
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
            if (isset($inputs['_token'])) unset($inputs['_token']);
            $pacient = new Paciente;
            $pacient = $pacient->create($inputs);
            if ($pacient) {
                $card = new FichaPeriodontal;
                $card->paciente()->associate($pacient);
                $card->save();
                return redirect()->route('card')->with('pacient', $pacient);
            } else {
                return redirect()->back()->withErrors(['El paciente ' . $inputs['name'] . ' ' . $inputs['lastname'] . ' con teléfono ' . $inputs['phone'] . ' Ya existe!']);
            }
        }
    }

    public function searchPacientAjax(Request $request)
    {
        $letter = $request->input('term');
        $pacients = $this->pacient->getPacientsByLetter($letter);
        $data = array();

        foreach ($pacients as $pacient) {
            $data[] = array(
                'value' => ucfirst($pacient->name) . ' ' . ucfirst($pacient->lastname) . ' ' . $pacient->phone,
                'id' => $pacient->id,
                'name' => ucfirst($pacient->name) . ' ' . ucfirst($pacient->lastname)
            );
        }

        return response()->json($data, 200);
    }

    public function editPacient(Request $request) {
        $data = $request->all();
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required'
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
            return redirect('/pacients/edit')->withErrors($validator)->withInput();
        } else {
            $pacient = new Paciente;
            $pacient = $pacient->find($data['id']);
            if ($pacient) {
                $pacient->update($data);
                return redirect()->route('newpacient')->with('message', 'Paciente: ' . $pacient->name . ' ' . $pacient->lastname . ' actualizado');
            }
        }
    }

    /**
     * Deletes user and redirect to list.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deletePacientAjax(Request $request)
    {
        //TODO make it an ajax call and refresh page content instaed redirect.
        $data = $request->all();
        $rules = [
            'id' => 'required'
        ];
        $messages = [
            'id.required' => 'No se ha enviado el id de cliente'

        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        //if something is wrong
        if ($validator->fails()){
            return redirect('/pacients/list')->withErrors($validator)->withInput();
        } else {
            $pacient = new Paciente;
            $pacient = $pacient->find($data['id']);
            if ($pacient) {
                $pacient->cuadrantes()->delete();
                $pacient->fichaperiodontal()->delete();
                $pacient->nextdates()->delete();
                $pacient->revisions()->delete();
                $pacient->delete();
                return redirect('pacients/list');
            }
        }
    }
}
