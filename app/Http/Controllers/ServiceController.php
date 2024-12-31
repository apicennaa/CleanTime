<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    /**
     * Menampilkan daftar layanan.
     */
    public function index()
    {
        $services = Services::all();
        $nav = 'Services List';
        return view('services.index', compact('services', 'nav'));
    }

    /**
     * Menampilkan form untuk menambahkan layanan baru.
     */
    public function create()
    {
        $nav = 'Add New Service';
        return view('services.create', compact('nav'));
    }

    /**
     * Menyimpan layanan baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'harga' => 'required|numeric|min:0',
        ]);

        // Simpan layanan baru
        Services::create($validatedData);

        return redirect()->route('services.index')->with('success', 'Service has been added successfully.');
    }

    /**
     * Menampilkan detail layanan tertentu.
     */
    public function show(string $id)
    {
        $service = Services::findOrFail($id);
        $nav = 'Service Details - ' . $service->nama;
        return view('services.show', compact('service', 'nav'));
    }

    /**
     * Menampilkan form untuk mengedit layanan.
     */
    public function edit(string $id)
    {
        $service = Services::findOrFail($id);
        $nav = 'Edit Service - ' . $service->nama;
        return view('services.edit', compact('service', 'nav'));
    }

    /**
     * Memperbarui data layanan di database.
     */
    public function update(Request $request, string $id)
    {
        // Temukan layanan berdasarkan ID
        $service = Services::findOrFail($id);

        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'harga' => 'required|numeric|min:0',
        ]);

        // Update data layanan
        $service->update($validatedData);

        return redirect()->route('services.index')->with('success', 'Service has been updated successfully.');
    }

    /**
     * Menghapus layanan dari database.
     */
    public function destroy(string $id)
    {
        // Temukan layanan berdasarkan ID
        $service = Services::findOrFail($id);

        // Hapus layanan
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service has been deleted successfully.');
    }
}
