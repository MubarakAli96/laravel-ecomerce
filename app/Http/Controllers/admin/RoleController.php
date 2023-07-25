<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.permission.index', compact('permissions'));
    }
    public function addPermission()
    {
        return view('admin.permission.create');
    }
    public function storePermission(Request $request)
    {
        $rules = Validator::make($request->all(), [

            'name' => 'required'
        ]);
        if ($rules->fails()) {
            return back()->withErrors($rules);
        }
        $permissions = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'status' => isset($request->status) ? 1 : 0,
        ]);
        if ($permissions) {
            return redirect()->route('all.permission')->with('success', ' the permission add successfully❤');
        } else {
            return redirect()->route('all.permission')->with('error', ' Sorry there is some error🤦‍♂️🤦‍♂️');
        }
    }
    public function editPermission($id)
    {
        $permissions = Permission::findOrfail($id);
        return view('admin.permission.edit', compact('permissions'));
    }
    public function updatePermission(Request $request)
    {

        $per_id = $request->id;

        $permissions = Permission::findOrfail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'status' => isset($request->status) ? 1 : 0,
        ]);
        if ($permissions) {
            return redirect()->route('all.permission')->with('success', ' the permission add successfully❤');
        } else {
            return redirect()->route('all.permission')->with('error', ' Sorry there is some error🤦‍♂️🤦‍♂️');
        }
    }
    public function destory($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('all.permission')->with('success', ' Record Delete successfully.');
    }

    // roles

    public function allRoles()
    {
        $roles = Role::get();
        return view('admin.roles.index', compact('roles'));
    }

    public function addRoles()
    {
        return view('admin.roles.create');
    }
    public function storeRoles(Request $request)
    {
        $rules = Validator::make($request->all(), [

            'name' => 'required'
        ]);
        if ($rules->fails()) {
            return back()->withErrors($rules);
        }
        $roles = Role::create([
            'name' => $request->name,

            'status' => isset($request->status) ? 1 : 0,
        ]);
        if ($roles) {
            return redirect()->route('all.roles')->with('success', ' the roles add successfully❤');
        } else {
            return redirect()->route('all.roles')->with('error', ' Sorry there is some error🤦‍♂️🤦‍♂️');
        }
    }
    public function editRoles($id)
    {
        $roles = Role::findOrfail($id);
        return view('admin.roles.edit', compact('roles'));
    }
    public function updateRoles(Request $request)
    {

        $per_id = $request->id;

        $roles = Role::findOrfail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'status' => isset($request->status) ? 1 : 0,
        ]);
        if ($roles) {
            return redirect()->route('all.roles')->with('success', ' the roles add successfully❤');
        } else {
            return redirect()->route('all.roles')->with('error', ' Sorry there is some error🤦‍♂️🤦‍♂️');
        }
    }
    public function Roelsdestory($id)
    {
        Role::find($id)->delete();
        return redirect()->route('all.roles')->with('success', ' Record Delete successfully.');
    }

    ///////////////////////////////add  roles permissions all methods////////////////////////////////////////////

    public function addrolespermision()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permision_groups = User::getpermissionGroup();
        return view('admin.roles_and_permission.create', compact('roles', 'permissions', 'permision_groups'));
    }

    public function rolePermissionStore(Request $request)
    {
        $data = array();
        $permission = $request->permission;
        foreach ($permission as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        }
        return redirect()->route('all.roles')->with('success', 'add this');
    }
}
