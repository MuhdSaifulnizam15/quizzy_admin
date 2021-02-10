<?php

namespace App\Http\Controllers\Web;

use App\Classroom;
use App\ClassroomUser;
use App\Subject;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use DataTables;

class ClassroomController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->setPageTitle('Classroom', 'List of Classroom');

        $classrooms = Classroom::all();
        if($request->ajax()){
            $data = Classroom::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a href="'. route("admin.classrooms.edit", $data->id) .'" class="btn btn-outline-primary m-1"><i class="fa fa-edit"></i></a>';
                        $btn .=  '<a href="'. route("admin.classrooms.detail", $data->id) .'" class="btn btn-outline-info m-1"><i class="far fa-eye"></i></a>';
                        $btn .=  '<a href="'. route("admin.classrooms.delete", $data->id) .'" class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i></a>';
                        return $btn;
                    })
                    ->addColumn('subject_name', function($data){
                        return $data->subject->name;
                    })
                    ->addColumn('subject_code', function($data){
                        return $data->subject->code;
                    })
                    ->addColumn('tutor_name', function($data){
                        return $data->tutor->name;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        $this->setPageTitle('Classroom', 'Add Classroom');
        $edit = false;
        $subjects = Subject::all();
        $tutors = User::role('tutor')->get();

        return view('admin.classrooms.create', compact('edit', 'subjects', 'tutors'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|unique:classrooms',
            'subject_id' => 'required',
            'tutor_id' => 'required',
        ]);

        $classroom = new Classroom();
        $classroom->name = $request->input('name');
        $classroom->subject_id = $request->input('subject_id');
        $classroom->tutor_id = $request->input('tutor_id');
        $classroom->save();

        return $this->responseRedirect('admin.classrooms.index', 'Classroom successfully added' ,'success', false, false);
    }

    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        $edit = true;
        $subjects = Subject::all();
        $tutors = User::role('tutor')->get();

        $this->setPageTitle('Classroom', 'Edit Classroom : ' . $classroom->name);
        return view('admin.classrooms.create', compact('classroom', 'edit', 'subjects', 'tutors'));
    }

    public function detail(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroomStudent = $classroom->users;

        if($request->ajax()){
            $data = $classroom->users;
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){;
                        $btn =  '<a href="#" class="btn btn-outline-info m-1"><i class="far fa-eye"></i></a>';
                        $btn .=  '<a href="#" class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        $this->setPageTitle('Classroom User', 'List of Class ' . $classroom->name . ' Student');
        return view('admin.classrooms.details', compact('classroomStudent'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      =>  'required|unique:classrooms,name,'.$id
        ]);
        
        $classroom = Classroom::findOrFail($id);
        $classroom->name = $request->input('name');    
        $classroom->subject_id = $request->input('subject_id');
        $classroom->tutor_id = $request->input('tutor_id');  
        $classroom->save();
        
        return $this->responseRedirect('admin.classrooms.index', 'Classroom successfully updated' ,'success', false, false);
    }

    public function delete($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return $this->responseRedirect('admin.classrooms.index', 'Classroom successfully deleted' ,'success', false, false);
    }
}
