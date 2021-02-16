<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Web\BaseController;
use App\Assignment;
use App\Subject;
use App\Quiz;
use App\Classroom;
use Illuminate\Http\Request;
use DataTables;

class AssignmentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->setPageTitle('Assignment', 'List of Assignments');

        $assignments = Assignment::all();
        if($request->ajax()){
            $data = Assignment::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a href="'. route("admin.assignments.edit", $data->id) .'" class="btn btn-outline-primary m-1">Edit</a>';
                        $btn .=  '<a href="'. route("admin.assignments.delete", $data->id) .'" class="btn btn-outline-danger m-1">Delete</a>';
                        return $btn;
                    })
                    ->addColumn('subject_name', function($data){
                        return $data->subject->name;
                    })
                    ->addColumn('quiz_name', function($data){
                        return $data->quizzes->name;
                    })
                    ->addColumn('class_name', function($data){
                        return $data->classroom->name;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Assignment', 'Add Assignment');
        $subjects = Subject::all();
        $quizzes = Quiz::all();
        $classrooms = Classroom::all();
        $edit = false;
        return view('admin.assignments.create', compact('edit', 'subjects', 'classrooms', 'quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required',
            'dateline'      =>  'required',
            'subject_id'      =>  'required',
            'classroom_id'      =>  'required',
            'quiz_id'      =>  'required',
            'priority'      =>  'required',
        ]);

        $assignment = new Assignment();
        $assignment->title = $request->input('title');
        $assignment->dateline = $request->input('dateline');
        $assignment->subject_id = $request->input('subject_id');
        $assignment->classroom_id = $request->input('classroom_id');
        $assignment->quiz_id = $request->input('quiz_id');
        $assignment->priority = $request->input('priority');
        $assignment->save();

        return $this->responseRedirect('admin.assignments.index', 'Assignment successfully added' ,'success', false, false);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Motivation  $motivation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        $edit = true;
        $subjects = Subject::all();
        $quizzes = Quiz::all();
        $classrooms = Classroom::all();

        $this->setPageTitle('Assignment', 'Edit Assignment : ' . $assignment->title);
        return view('admin.assignments.create', compact('assignment', 'edit', 'assignment', 'subjects', 'classrooms', 'quizzes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Motivation  $motivation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'      =>  'required',
            'dateline'      =>  'required',
            'subject_id'      =>  'required',
            'classroom_id'      =>  'required',
            'quiz_id'      =>  'required',
            'priority'      =>  'required',
        ]);
        
        $assignment = Assignment::findOrFail($id);
        $assignment->title = $request->input('title');
        $assignment->dateline = $request->input('dateline');
        $assignment->subject_id = $request->input('subject_id');
        $assignment->classroom_id = $request->input('classroom_id');
        $assignment->quiz_id = $request->input('quiz_id');
        $assignment->priority = $request->input('priority');
        $assignment->save();
        
        return $this->responseRedirect('admin.assignments.index', 'Assignment successfully updated' ,'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();

        return $this->responseRedirect('admin.assignments.index', 'Assignment successfully deleted' ,'success', false, false);
    }
}
