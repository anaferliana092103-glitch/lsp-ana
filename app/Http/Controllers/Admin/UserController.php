<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim()->toString();
        $users = User::query()->when($search, fn ($q) => $q->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%"))->latest()->paginate(10)->withQueryString();
        return view('admin.users.index', compact('users', 'search'));
    }

    public function create(): View { return view('admin.users.form', ['user' => new User(), 'title' => 'Tambah User']); }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user): View { return view('admin.users.form', compact('user') + ['title' => 'Edit User']); }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $this->validated($request, $user);
        if (blank($data['password'])) unset($data['password']); else $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->is(auth()->user())) return back()->with('error', 'User yang sedang login tidak dapat dihapus.');
        $user->delete();
        return back()->with('success', 'User berhasil dihapus.');
    }

    private function validated(Request $request, ?User $user = null): array
    {
        return $request->validate(['name' => ['required','string','max:255'], 'email' => ['required','email','max:255', Rule::unique('users')->ignore($user)], 'password' => [$user ? 'nullable' : 'required','string','min:8'], ]);
    }
}
