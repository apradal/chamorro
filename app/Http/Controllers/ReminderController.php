<?php

namespace App\Http\Controllers;
use App\NextDate;
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
            ->whereMonth('next_date', '<=', date('m'))
            ->whereYear('next_date', '<=', date('Y'))
            ->leftJoin('pacientes as b', 'b.id', '=', 'a.paciente_id')
            ->orderBy('next_date', 'asc')
            ->get();

        if ($dates->count() > 0) {
            foreach ($dates as $date) {
                $date->next_date = Carbon::parse($date->next_date)->format('d-m-Y');
                $data[] = $date;
            }
        }

        if (count($data) > 0) {
            $view = view('includes.reminder.reminder', ['next_dates' => $data]);
        } else {
            $view = view('includes.reminder.reminder');
        }

        $view = $view->render();
        session(['reminder' => $view]);

        return response()->json($view, 200);
    }

    public function closeDate(Request $request) {
        $id = $request->input('id');
        $nextDate = new NextDate();
        $nextDate = $nextDate->find($id);
        if ($nextDate) {
            $nextDate->closed = 1;
            $nextDate->save();
            if (session('reminder')) $request->session()->forget('reminder');
        }

        return response()->json(true, 200);
    }

}
