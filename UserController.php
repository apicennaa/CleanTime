<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Register akun dan menambahkan profil.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'nullable|string|in:user,cleaner,admin',
        ]);

        // Hash password sebelum disimpan
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Membuat user baru
        User::create($validatedData);

        return redirect()->route('login')->with('success', 'Account successfully registered!');
    }

    /**
     * Melihat informasi akun dan riwayat order.
     */
    public function show(string $id)
    {
        // Ambil data user berdasarkan ID
        $user = User::findOrFail($id);

        // Ambil riwayat order terkait user
        $orders = Orders::where('user_id', $user->id)->get();

        $nav = 'User Profile & Order History';

        return view('users.show', compact('user', 'orders', 'nav'));
    }

    /**
     * Edit informasi akun.
     */
    public function edit(string $id)
    {
        // Ambil data user berdasarkan ID
        $user = User::findOrFail($id);

        $nav = 'Edit User Profile';

        return view('users.edit', compact('user', 'nav'));
    }

    /**
     * Update informasi akun.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data user berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Jika password diisi, hash password baru
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']); // Jangan ubah jika kosong
        }

        // Update data user
        $user->update($validatedData);

        return redirect()->route('users.show', $id)->with('success', 'Profile updated successfully.');
    }

    /**
     * Hapus akun.
     */
    public function destroy(string $id)
    {
        // Ambil data user berdasarkan ID
        $user = User::findOrFail($id);

        // Hapus data user
        $user->delete();

        return redirect()->route('home')->with('success', 'Account deleted successfully.');
    }
}