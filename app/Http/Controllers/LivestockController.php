<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LivestockController extends Controller
{
    public function index()
    {
        $livestocks = Livestock::all();
        return view('peternakpage.manajementernak', compact('livestocks'));
    }

    public function create()
    {
        return view('livestocks.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'jenis' => ['required','string','max:100'],
                'ras'   => ['required','string','max:100'],
                'stok'  => ['required','integer','min:0'],
                'image' => ['nullable','image','max:2048'], // 2MB
            ]);

            // pastikan stok integer
            $data['stok'] = (int) $data['stok'];

            // handle image jika ada
            if ($request->hasFile('image')) {
                $data['image_path'] = $request->file('image')->store('livestocks', 'public');
            }

            $livestock = Livestock::create($data);

            return redirect()->route('livestocks.index')
                ->with('success', 'Data ternak berhasil ditambahkan');

        } catch (\Exception $e) {
            \Log::error('Failed to create livestock: '.$e->getMessage());
            return back()->withErrors('Gagal menambahkan ternak, cek log.');
        }
    }

    public function edit(Livestock $livestock)
    {
        return view('livestocks.edit', compact('livestock'));
    }

    public function update(Request $request, Livestock $livestock)
    {
        try {
            $data = $request->validate([
                'jenis' => ['required','string','max:100'],
                'ras'   => ['required','string','max:100'],
                'stok'  => ['required','integer','min:0'],
                'image' => ['nullable','image','max:2048'],
            ]);

            $data['stok'] = (int) $data['stok'];

            if ($request->hasFile('image')) {
                if ($livestock->image_path && Storage::disk('public')->exists($livestock->image_path)) {
                    Storage::disk('public')->delete($livestock->image_path);
                }
                $data['image_path'] = $request->file('image')->store('livestocks', 'public');
            }

            $livestock->update($data);

            return redirect()->route('livestocks.index')
                ->with('success', 'Data ternak berhasil diupdate');

        } catch (\Exception $e) {
            \Log::error('Failed to update livestock: '.$e->getMessage());
            return back()->withErrors('Gagal mengupdate ternak, cek log.');
        }
    }

    public function destroy(Livestock $livestock)
    {
        try {
            if ($livestock->image_path && Storage::disk('public')->exists($livestock->image_path)) {
                Storage::disk('public')->delete($livestock->image_path);
            }
            $livestock->delete();

            return redirect()->route('livestocks.index')
                ->with('success', 'Data ternak berhasil dihapus');
        } catch (\Exception $e) {
            \Log::error('Failed to delete livestock: '.$e->getMessage());
            return back()->withErrors('Gagal menghapus ternak, cek log.');
        }
    }
}
