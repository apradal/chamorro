<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Paciente;
use App\FichaPeriodontal;

class PacientListController extends Controller
{
    protected $_pacient = null;

    protected $_pacientsList = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->_pacient = new Paciente;
    }

    /**
     * Get all pacients from model.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPacient()
    {
        $this->_pacientsList = $this->_pacient->getAllPacients();
        return view('pacients.list')->with('pacients', $this->_pacientsList);
    }
}
