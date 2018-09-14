<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReminderController extends Controller
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

    public function getDates()
    {
        $data = array();
        $today = Carbon::now()->format('Y-m-d');
        $dates = DB::table('next_dates as a')->select('b.name', 'b.lastname', 'a.id', 'a.treatment', 'a.next_date')
            ->where('next_date', '>', $today)
            ->where('closed', '=', 0)
            ->leftJoin('pacientes as b', 'b.id', '=', 'a.paciente_id')
            ->get();

        if ($dates->count() > 0) {
            foreach ($dates as $date) {
                $data[] = $date;
            }
        }

        $view = view('includes.reminder.reminder', ['next_dates' => $data]);
        $view = $view->render();
        session(['reminder' => $view]);

        return response()->json($view, 200);
    }

}
