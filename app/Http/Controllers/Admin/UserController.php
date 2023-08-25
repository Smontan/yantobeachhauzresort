<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validate  = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer']
        ]);

            User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);

        flash()
            ->option('timeout', 3000)
            ->addSuccess('User added successfully!');
        // return redirect('admin/users')->with('message', 'User added successfully!');
        return redirect('admin/users');
    }

    public function edit(int $user_id)
    {
        $user = User::findOrFail($user_id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, int $user_id)
    {
        $validate  = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer'],
            'cancellation_count' => ['required', 'integer']
        ]);

            User::findOrFail($user_id)->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
            'cancellation_count' => $request->cancellation_count
        ]);

        flash()
            ->option('timeout', 3000)
            ->addSuccess('User updated successfully!');
        // return redirect('admin/users')->with('message', 'User updated successfully!');
        return redirect('admin/users');
    }

}
