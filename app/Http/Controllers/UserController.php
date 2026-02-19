<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

  public function index()
  {
    $users = User::with('roles')->paginate(5);
    return view('users.index',compact('users'));
  }

  public function create()
  {
    $roles = Role::all();
    return view('users.create',compact('roles'));
  }

  public function store(Request $request)
  {
    $validate = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string|min:8|confirmed',
      'roles' => 'array|nullable',
      'roles.*' => 'string|exists:roles,name'
    ]);

    $user = User::create([
      'name' => $validate['name'],
      'email' => $validate['email'],
      'password' => bcrypt($validate['password']),
    ]);

    if(!empty($validate['roles']))
    {
      $user->assignRole($validate['roles']);
    }
    return redirect()->route('users.index')->with('success', 'تم إنشاء المستخدم بنجاح.');
  }

  public function edit(User $user)
  {
    $roles = Role::all();
    return view('users.edit', compact('user', 'roles'));
  }

  public function update(Request $request,User $user)
  {
    $validate = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
      'password' => 'nullable|string|min:8|confirmed',
      'roles' => 'array|nullable',
      'roles.*' => 'string|exists:roles,name'
    ]);
    $user->update([
      'name' => $validate['name'],
      'email' => $validate['email']
    ]);
    if($request->filled('password'))
    {
      $user->update(['password'=>bcrypt($validate['password'])]);
    }
    if(!empty($validate['roles']))
    {
      $user->assignRole($validate['roles']);
    }
    return redirect()->route('users.index')->with('success', 'تم تحديث المستخدم بنجاح.');
  }

  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح.');
  }

  public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ])->onlyInput('email');
    }

    public function showLogin()
    {
        return view('Auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
