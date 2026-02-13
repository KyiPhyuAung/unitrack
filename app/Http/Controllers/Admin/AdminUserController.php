<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(25);
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function updateRole(Request $request, User $user)
    {
        $data = $request->validate([
            'role' => ['required','in:standard,premium,admin'],
        ]);

        // Optional: prevent demoting yourself from admin accidentally
        if ($request->user()->id === $user->id && $data['role'] !== 'admin') {
            return back()->with('error', "You can't remove your own admin role.");
        }

        $user->update(['role' => $data['role']]);
        return back()->with('success', 'User role updated ✅');
    }

    public function destroy(Request $request, User $user)
    {
        // Optional: prevent deleting yourself
        if ($request->user()->id === $user->id) {
            return back()->with('error', "You can't delete your own account.");
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted 🗑️');
    }
}