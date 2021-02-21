<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use PDF;
use App\Classroom;
use App\User;
use App\Quiz;

class ReportController extends BaseController
{
    public function index(Request $request){
        $this->setPageTitle('Report', 'Generate Report');

        return view('admin.reports.index');
    }

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
        $class = Classroom::with(['assignments', 'subject', 'users', 'tutor'])
                        ->where('tutor_id', '=', 11)
                        ->get();
        // dd($class);

        view()->share([
            'class' => $class,
        ]);

        $pdf = PDF::loadView('admin.reports.tutor');

        if ($request->has('download')) {
            return $pdf->download('');
        }

        return $pdf->stream();
    }

    public function quizReport(Request $request){
        $this->setPageTitle('Report', 'Quiz Report');

        $quiz = Quiz::with(['questions', 'mark', 'subject', 'assignment'])
                    ->where('id', '=', 2)
                    ->get();
        // dd($quiz);

        // view()->share([
        //     'quiz' => $quiz,
        // ]);

        // $pdf = PDF::loadView('admin.reports.quiz');

        // if ($request->has('download')) {
        //     return $pdf->download('');
        // }

        // return $pdf->stream();
        return view('admin.reports.quiz', compact('quiz'));
    }


}
