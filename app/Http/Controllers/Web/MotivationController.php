<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use App\Motivation;
use Illuminate\Http\Request;
use DataTables;
class MotivationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->setPageTitle('Motivation', 'List of Motivations');

        $motivations = Motivation::all();
        if($request->ajax()){
            $data = Motivation::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a href="'. route("admin.motivations.edit", $data->id) .'" class="btn btn-outline-primary m-1">Edit</a>';
                        $btn .=  '<a href="'. route("admin.motivations.delete", $data->id) .'" class="btn btn-outline-danger m-1">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.motivation.index', compact('motivations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Motivation', 'Add Motivation');
        $edit = false;
        return view('admin.motivations.create', compact('edit'));
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
            'quote'      =>  'required|unique:motivation_quotes',
            'author'      =>  'required'
        ]);

        $motivation = new Motivation();
        $motivation->quote = $request->input('quote');
        $motivation->author = strtoupper($request->input('author'));
        $motivation->save();

        return $this->responseRedirect('admin.motivations.index', 'Motivation successfully added' ,'success', false, false);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Motivation  $motivation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motivation = Motivation::findOrFail($id);
        $edit = true;

        $this->setPageTitle('Motivation', 'Edit Motivation : ' . $motivation->name);
        return view('admin.subjects.create', compact('motivation', 'edit'));
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
            'quote'      =>  'required|unique:motivation_quotes',
            'author'      =>  'required'
        ]);
        
        $motivation = Motivation::findOrFail($id);
        $motivation->quote = $request->input('quote');    
        $motivation->author = $request->input('author');  
        $motivation->save();
        
        return $this->responseRedirect('admin.motivations.index', 'Motivation successfully updated' ,'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $motivation = Motivation::findOrFail($id);
        $motivation->delete();

        return $this->responseRedirect('admin.motivations.index', 'Motivation successfully deleted' ,'success', false, false);
    }
}
