<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
      return view('dashboard', [
      'totalUsers' => User::count(),
      'totalRoles' => Role::count(),
      'totalPermissions' => Permission::count(),
      'totalAdmins' => Permission::where('name', 'admin')->first()->users()->count(),
      'recentUsers' => User::latest()->take(5)->get(),
      ]);
    }
}
