<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Classroom;
use App\Quiz;
use App\Assignment;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalStudents = User::role('student')->count();
        $totalClasses = Classroom::all()->count();
        $ongoingQuiz = Quiz::all()
                            ->where('is_active', '=', '1')
                            ->count();
        $ongoingAssignment = Assignment::all()->count();

        return view('admin/dashboard', compact('totalStudents', 'totalClasses', 'ongoingQuiz', 'ongoingAssignment'));
    }
}