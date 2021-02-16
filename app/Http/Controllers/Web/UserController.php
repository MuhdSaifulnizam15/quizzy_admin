<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use Spatie\Permission\Models\Role;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->setPageTitle('Users', 'List of User');
        $users = User::all();
        if($request->ajax()){
            $data = User::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a href="'. route("admin.users.edit", $data->id) .'" class="btn btn-outline-primary m-1"><i class="fa fa-edit"></i></a>';
                        $btn .=  '<a href="'. route("admin.users.delete", $data->id) .'" class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i></a>';
                        return $btn;
                    })
                    ->addColumn('roles', function($data){
                        return $data->roles()->pluck('name')->implode(' ');
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Users', 'Add Users');
        $edit = false;
        $roles = Role::all();
        return view('admin.users.create', compact('edit', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = true;
        $user = User::findOrFail($id);
        $roles = Role::all();
        $user_role = $user->roles()->pluck('name')->implode(' ');
        $this->setPageTitle('Users', 'Edit Users : ' . $user->name);
        return view('admin.users.create', compact('edit', 'user', 'roles', 'user_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'role_name' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->assignRole($request->input('role_name'));
        $user->save();
        
        return $this->responseRedirect('admin.users.index', 'User successfully updated' ,'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return $this->responseRedirect('admin.users.index', 'User successfully deleted' ,'success', false, false);
    }
}
