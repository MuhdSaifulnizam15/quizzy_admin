<?php

namespace App\Http\Controllers\Web;

use App\Classroom;
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
                        $btn .=  '<a href="'. route("admin.classrooms.delete", $data->id) .'" class="btn btn-outline-danger m-1">Del<i class="fa fa-trash"></i>ete</a>';
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
        return view('admin.classrooms.create', compact('edit'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|unique:classrooms'
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

        $this->setPageTitle('Classroom', 'Edit Classroom : ' . $classroom->name);
        return view('admin.classrooms.create', compact('classroom', 'edit'));
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
