<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.pages.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:backend.pages.users',
            'password' => 'required|min:8',
        ]);

        User::create($request->all());

        return redirect()->route('backend.pages.users.index')
                         ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('backend.pages.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('backend.pages.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:backend.pages.users,email,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('backend.pages.users.index')
                         ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('backend.pages.users.index')
                         ->with('success', 'User deleted successfully.');
    }
}
