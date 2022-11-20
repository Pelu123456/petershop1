<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Permission $permissionModel, User $userModel){
        $this->permission = $permissionModel;

        $this->user = $userModel;
        
    }



    public function index()
    {
        $permission = $this->permission::all();
        return view('permissions.permission-index', compact('permission'));
    }
    public function Userindex()
    {
        $user = $this->user::all();
        return view('user.user-list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.permission-index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        $permission = Permission::create($validated_data);
        return redirect()->route('admin.permission')->with('status', 'Complete');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $permission = $this->permission->findOrfail($id);
        return view('permissions.permission-edit', compact('permission'));
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
        $validated_data = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        $permission = $this->permission->findOrfail($id);
        $permission ->update($validated_data);
        return redirect()->route('admin.permission')->with('status', 'Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = $this->permission->findOrfail($id);
        return view('permissions.delete', compact('permission'));
    }
    public function delete($id)
    {
        $permission = $this->permission->findOrfail($id);
        $permission ->delete();
        return redirect()->route('admin.permission');
    }
}