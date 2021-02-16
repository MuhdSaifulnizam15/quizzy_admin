<?php

namespace App\Http\Controllers\Web;

use App\Subject;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use DataTables;

class SubjectController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->setPageTitle('Subject', 'List of Subject');

        $subjects = Subject::all();
        if($request->ajax()){
            $data = Subject::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a href="'. route("admin.subjects.edit", $data->id) .'" class="btn btn-outline-primary m-1"><i class="fa fa-edit"></i></a>';
                        $btn .=  '<a href="'. route("admin.subjects.delete", $data->id) .'" class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $this->setPageTitle('Subject', 'Add Subject');
        $edit = false;
        return view('admin.subjects.create', compact('edit'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|unique:subjects',
            'code'     =>  'required|max:10|unique:subjects'
        ]);

        $subject = new Subject();
        $subject->name = $request->input('name');
        $subject->code = strtoupper($request->input('code'));
        $subject->save();

        return $this->responseRedirect('admin.subjects.index', 'Subject successfully added' ,'success', false, false);
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $edit = true;

        $this->setPageTitle('Subject', 'Edit Subject : ' . $subject->name);
        return view('admin.subjects.create', compact('subject', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      =>  'required|unique:subjects,name,'.$id,
            'code'     =>  'required|max:10|unique:subjects,code,'.$id
        ]);
        
        $subject = Subject::findOrFail($id);
        $subject->name = $request->input('name');    
        $subject->code = $request->input('code');  
        $subject->save();
        
        return $this->responseRedirect('admin.subjects.index', 'Subject successfully updated' ,'success', false, false);
    }

    public function delete($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return $this->responseRedirect('admin.subjects.index', 'Subject successfully deleted' ,'success', false, false);
    }
}
