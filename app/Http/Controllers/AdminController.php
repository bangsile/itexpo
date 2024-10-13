<?php

namespace App\Http\Controllers;

use App\Models\AdminStand;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'admin')->get();
        return view('manage-admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manage-admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
            'stand' => ['required'],
            'role' => ['required'],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        event(new Registered($user = User::create($validated)));
        AdminStand::create([
            'user_id' => $user->id,
            'stand' => $validated['stand'],
        ]);
        return redirect()->route('manage-admin')->with('success', 'Admin berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $username)
    {
        $user = User::where('email', $username)->first();
        return view('manage-admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $username)
    {
        $user = User::where('email', $username)->first();
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'stand' => ['required'],
        ]);

        $user->update($validated);
        AdminStand::where('user_id', $user->id)->update(['stand' => $validated['stand']]);
        return redirect()->route('manage-admin')->with('success', 'Admin berhasil diupdate');
    }

    public function resetPassword(Request $request, string $username)
    {
        User::where('email', $username)->update(['password' => Hash::make('password')]);
        
        return redirect()->route('manage-admin')->with('success', 'Password admin berhasil direset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
