<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;
use Illuminate\Support\Facades\Auth;

class FarmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampilkan semua farm milik user
    public function index()
    {
        $farms = Auth::user()->farms;
        return view('peternakpage.farm');
    }

    // Tampilkan form tambah farm
    public function create()
    {
        return view('farm'); // sesuai file blade
    }

    // Simpan farm baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_peternak' => 'required|string|max:255',
            'nama_peternakan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'email' => 'nullable|email|max:255',
            'nomor_hp' => 'nullable|string|max:20',
            'description' => 'nullable|string|max:1000',
            'livestock_type' => 'nullable|string|max:50',
            'website' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = [
            'owner_name' => $request->nama_peternak,
            'name' => $request->nama_peternakan,
            'location' => $request->alamat,
            'email' => $request->email,
            'phone' => $request->nomor_hp,
            'description' => $request->description,
            'livestock_type' => $request->livestock_type,
            'website' => $request->website,
        ];

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/farms', $filename);
            $data['photo'] = 'storage/farms/' . $filename;
        }

        Auth::user()->farms()->create($data);

        return redirect()->route('farms.index')->with('success', 'Farm berhasil ditambahkan!');
    }

    // Form edit farm
    public function edit(Farm $farm)
    {
        if ($farm->user_id != Auth::id()) {
            abort(403);
        }

        return view('farms.edit', compact('farm'));
    }

    // Update farm
    public function update(Request $request, Farm $farm)
    {
        if ($farm->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nama_peternak' => 'required|string|max:255',
            'nama_peternakan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'email' => 'nullable|email|max:255',
            'nomor_hp' => 'nullable|string|max:20',
            'description' => 'nullable|string|max:1000',
            'livestock_type' => 'nullable|string|max:50',
            'website' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = [
            'owner_name' => $request->nama_peternak,
            'name' => $request->nama_peternakan,
            'location' => $request->alamat,
            'email' => $request->email,
            'phone' => $request->nomor_hp,
            'description' => $request->description,
            'livestock_type' => $request->livestock_type,
            'website' => $request->website,
        ];

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/farms', $filename);
            $data['photo'] = 'storage/farms/' . $filename;
        }

        $farm->update($data);

        return redirect()->route('farms.index')->with('success', 'Farm berhasil diperbarui!');
    }

    // Hapus farm
    public function destroy(Farm $farm)
    {
        if ($farm->user_id != Auth::id()) {
            abort(403);
        }

        $farm->delete();

        return redirect()->route('farms.index')->with('success', 'Farm berhasil dihapus!');
    }
}
