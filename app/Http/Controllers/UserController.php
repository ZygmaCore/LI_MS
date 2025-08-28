<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('peminjamans')->get();
        return response()->json($users);
    }

    // Public registration (deferred until email is verified)
    public function publicStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'in:admin,guru,siswa',
        ]);

        // Simpan data pendaftaran sementara di cache (tanpa masuk DB)
        $payload = [
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'] ?? 'siswa',
        ];

        $token = bin2hex(random_bytes(32));
        cache()->put('register:'.$token, $payload, now()->addMinutes(60));

        // Kirim link verifikasi manual (tanpa membuat user)
        $verifyUrl = route('register.verify', ['token' => $token]);
        try {
            \Mail::raw("Klik link berikut untuk verifikasi pendaftaran akun Anda: \n".$verifyUrl, function($m) use ($payload) {
                $m->to($payload['email'])->subject('Verifikasi Pendaftaran Akun');
            });
        } catch (\Throwable $e) {
            cache()->forget('register:'.$token);
            return back()->withErrors(['email' => 'Gagal mengirim email verifikasi. Coba lagi.']);
        }

        return redirect()->route('register.notice')->with('email', $payload['email']);
    }

    // Admin/API: create user immediately (kept for resource routes and tests)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'in:admin,guru,siswa',
        ]);

        $validated['role'] = $validated['role'] ?? 'siswa';
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        // Kirim email verifikasi standar
        event(new Registered($user));

        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return response()->json($user->load('peminjamans'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'sometimes|required|in:admin,guru,siswa',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
