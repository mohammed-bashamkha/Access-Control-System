<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(5);
        return view('permissions.index',compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
      $validated = $request->validate([
        'name' => 'required|string|unique:permissions,name',
      ]);
      $text = $validated['name'];
      $validated['name'] = str_replace(' ', '_', $text);
      if(Permission::where('name', $validated['name'])->exists()) {
        return back()->withErrors(['name' => 'هذه الصلاحية موجودة بالفعل.'])->withInput();
      }
      Permission::create($validated);
      return redirect()->route('permissions.index')->with('success', 'تم إنشاء الصلاحية بنجاح.');
    }

    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:permissions,name,' . $permission->id,
        ]);
        $text = $validated['name'];
        $validated['name'] = str_replace(' ', '_', $text);
        if(Permission::where('name', $validated['name'])->where('id', '!=', $permission->id)->exists()) {
            return back()->withErrors(['name' => 'هذه الصلاحية موجودة بالفعل.'])->withInput();
        }
        $permission->update($validated);
        return redirect()->route('permissions.index')->with('success', 'تم تحديث الصلاحية بنجاح.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'تم حذف الصلاحية بنجاح.');
    }
}
