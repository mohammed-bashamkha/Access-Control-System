<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
      $this->authorize('viewAny', User::class);
      $roles = Role::with('permissions')->paginate(5);
      return view('roles.index',compact('roles'));
    }

    public function create()
    {
      $this->authorize('create', User::class);
      $permissions = Permission::all();
      return view('roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
      $this->authorize('create', User::class);
      $validated = $request->validate([
        'name' => 'required|string|unique:roles,name',
        'permissions' => 'array|nullable',
        'permissions.*' => 'string|exists:permissions,name'
      ]);

      if(Role::where('name', $validated['name'])->exists()) {
        return back()->withErrors(['name' => 'هذا الدور موجود بالفعل.'])->withInput();
      }
      $role = Role::create($validated);
      if(!empty($validated['permissions'])) {
        $role->syncPermissions($validated['permissions']);
      }
      return redirect()->route('roles.index')->with('success', 'تم إنشاء الدور بنجاح.');
    }

    public function edit(Role $role)
    {
      $this->authorize('update', $role);
      $permissions = Permission::all();
      return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
      $this->authorize('update', $role);
      $validated = $request->validate([
        'name' => 'required|string|unique:roles,name,' . $role->id,
        'permissions' => 'array|nullable',
        'permissions.*' => 'string|exists:permissions,name'
      ]);

      if(Role::where('name', $validated['name'])->where('id', '!=', $role->id)->exists()) {
        return back()->withErrors(['name' => 'هذا الدور موجود بالفعل.'])->withInput();
      }
      $role->update($validated);

      if(!empty($validated['permissions'])) {
        $role->syncPermissions($validated['permissions']);
      } else {
        $role->syncPermissions([]);
      }
      return redirect()->route('roles.index')->with('success', 'تم تحديث الدور بنجاح.');
    }

    public function destroy(Role $role)
    {
      $this->authorize('delete', $role);
      $role->delete();
      return redirect()->route('roles.index')->with('success', 'تم حذف الدور بنجاح.');
    }
}
