<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    private const ROLES = ['Admin', 'Dosen', 'Mahasiswa'];

    public function index(): View
    {
        $users = User::with('roles')->orderBy('name')->paginate(15);

        return view('admin.users.index', [
            'users' => $users,
            'availableRoles' => self::ROLES,
        ]);
    }

    public function updateRole(Request $request, User $user): RedirectResponse
    {
        if ($request->user()->is($user)) {
            return back()->withErrors([
                'role' => 'Role akun yang sedang digunakan tidak dapat diubah.',
            ]);
        }

        $validated = $request->validate([
            'role' => ['required', 'string', Rule::in(self::ROLES)],
        ]);

        $user->syncRoles($validated['role']);

        return back()->with('status', "Role {$user->name} berhasil diperbarui.");
    }
}
