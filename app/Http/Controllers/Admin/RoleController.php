<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Role $roleModel, User $userModel){
        $this->role = $roleModel;

        $this->user = $userModel;
        
    }



    public function index()
    {
        $role = $this->role::all();
        return view('role.role-index', compact('role'));
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
        return view('role.role-index');
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
        $role = Role::create($validated_data);
        return redirect()->route('admin.role')->with('status', 'Tạo vai trò thành công');

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
        $role = $this->role->findOrfail($id);
        return view('role.role-edit', compact('role'));
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
        $role = $this->role->findOrfail($id);
        $role ->update($validated_data);
        return redirect()->route('admin.role')->with('status', 'Cập nhật vai trò thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = $this->roles->findOrfail($id);
        return view('role.role-destroy', compact('roles'));
    }
    public function delete($id)
    {
        $roles = $this->roles->findOrfail($id);
        $roles->delete();
        return redirect()->route('admin.role');
    }
}