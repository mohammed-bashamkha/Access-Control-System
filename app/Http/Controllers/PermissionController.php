<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  use AuthorizesRequests;
    public function index()
    {
        $this->authorize('viewAny', Permission::class);
        $permissions = Permission::paginate(5);
        return view('permissions.index',compact('permissions'));
    }

    public function create()
    {
        $this->authorize('create', Permission::class);
        return view('permissions.create');
    }

    public function store(Request $request)
    {
      $this->authorize('create', Permission::class);

      $request->merge([
          'name' => str_replace(' ', '_', $request->name),
      ]);

      $validated = $request->validate([
          'name' => 'required|string|unique:permissions,name',
      ]);

      Permission::create($validated);

      return redirect()->route('permissions.index')
          ->with('success', 'تم إنشاء الصلاحية بنجاح.');
  }

    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
      $this->authorize('update', $permission);

      $request->merge([
          'name' => str_replace(' ', '_', $request->name),
      ]);

      $validated = $request->validate([
          'name' => 'required|string|unique:permissions,name,' . $permission->id,
      ]);

      $permission->update($validated);

      return redirect()->route('permissions.index')
          ->with('success', 'تم تحديث الصلاحية بنجاح.');
  }

    public function destroy(Permission $permission)
    {
      $this->authorize('delete', $permission);

      if ($permission->roles()->count() > 0) {
            return back()->withErrors([
                'error' => 'لا يمكن حذف صلاحية مرتبطة بأدوار.'
            ]);
      }

      $permission->delete();

      return redirect()->route('permissions.index')
          ->with('success', 'تم حذف الصلاحية بنجاح.');
    }
}
