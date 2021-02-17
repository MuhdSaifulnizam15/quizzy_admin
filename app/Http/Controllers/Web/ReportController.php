<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Classroom;

class ReportController extends Controller
{
    public function classReport(Request $request){
        $class = Classroom::with(['users', 'tutor', 'subject'])
                ->where('id', '=', '1')
                ->get();
        dd($class);
        view()->share([
            'class' => $class,

        ]);

        $pdf = PDF::loadView('admin.reports.class');

        if ($request->has('download')) {
            return $pdf->download('');
        }

        return $pdf->stream();
    }

    public function assignmentReport(Request $request){
        
    }

    public function tutorReport(Request $request){
        
    }

    public function quizReport(Request $request){
        
    }
}
