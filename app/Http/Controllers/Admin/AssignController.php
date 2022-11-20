<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illumiate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class AssignController extends Controller
{
    public function __construct(Permission $permissionModel, Role $roleModel, User $userModel){
        $this->permissions = $permissionModel;
        $this->roles = $roleModel;
        $this->users = $userModel;
    }
    public function index(){
        $user = User::with('role', 'permissions')->get();
        return view('permissions.assign-role', compact('user'));
    }
    public function rolePermission(){
        $role = $this->roles->with('permissions')->get();

        return view('permissions.assign', compact('role'));
    }

    public function assignPermission($id){
        $role = $this->roles->findOrfail($id);
        $permission = Permission::all();
        $get_permission = $role->permissions;
        return view('permissions.assign-permission', compact('permission', 'role', 'get_permission'));
    }
    public function insertPermission(Request $request, $id){
        $data = $request->all();
        $role = $this->roles->find($id);
        $role->syncPermissions($data['permission']);
        return redirect()->route('admin.assign')->with('status', 'Successfully assigning permission');
    }

    public function assignRole($id){
        $user = User::findOrfail($id);
        $role = Role::all();
        $get_colum_roles = $user->roles->first();
        return view('permissions.assign-role', compact('user', 'role', 'get_colum_roles'));
    }
    public function insertRole(Request $request, $id){
        $data = $request->all();
        $user = $this->users->find($id);
        $user->syncRoles($data['role']);
        return redirect()->route('admin.User-list')->with('status', 'Complete');
    }

    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        //
    }
}