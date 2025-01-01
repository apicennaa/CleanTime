<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cleaners;

class CleanersController extends Controller
{
    //
    public function index()
    {
        $cleaners = Cleaners::all();
        $nav = 'Cleaner list';
        return view('cleaners.index', compact('cleaners', 'nav'));  
    }
    /**
     * Mendaftar sebagai cleaner dan menambahkan slot waktu.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string|max:50', // available/unavailable
            'experience' => 'nullable|integer|min:0',
        ]);



        
        // Membuat data cleaner baru
        Cleaners::create($validatedData);

        return redirect()->route('cleaners.index')->with('success', 'Cleaner registered and slots added successfully.');
    }

 /**
     * Melihat jadwal pekerjaan dan riwayat pekerjaan.
     */
    public function show(Cleaners $cleaners)
    {
        // Ambil jadwal pekerjaan aktif (pending/in_progress)
        $activeJobs = Orders::where('cleaner_id', $cleaners->id)
            ->whereIn('status', ['pending', 'in_progress'])
            ->get();

        // Ambil riwayat pekerjaan (completed/cancelled)
        $jobHistory = Orders::where('cleaner_id', $cleaners->id)
            ->whereIn('status', ['completed', 'cancelled'])
            ->get();

        $nav = 'Cleaner Schedule & History - ' . $cleaners->id;

        return view('cleaners.schedule', compact('cleaners', 'activeJobs', 'jobHistory', 'nav'));
    }

    /**
     * Mengedit profil cleaner dan mengubah status (available/unavailable).
     */
    public function update(Request $request, Cleaners $cleaners)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'status' => 'required|string|max:50', // available/unavailable
            'experience' => 'nullable|integer|min:0',
        ]);

        // Update data profil cleaner
        $cleaners->update($validatedData);

        return redirect()->route('cleaners.show', $cleaners->id)
            ->with('success', 'Cleaner profile updated successfully.');
    }

    /**
     * Menghapus profil cleaner.
     */
    public function destroy(Cleaners $cleaners)
    {
        // Hapus profil cleaner
        $cleaners->delete();

        return redirect()->route('cleaners.index')->with('success', 'Cleaner profile deleted successfully.');
    }
}
