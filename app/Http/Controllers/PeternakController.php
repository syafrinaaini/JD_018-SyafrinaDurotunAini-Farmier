<?php

namespace App\Http\Controllers;

use App\Models\Peternak;
use Illuminate\Http\Request;

class PeternakController extends Controller
{
    public function formGabung()
    {
        // Karena view kita langsung peternak.blade.php di folder views
        return view('peternak');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama_peternak'   => 'required|string|max:100',
            'nama_peternakan' => 'required|string|max:150',
            'email'           => 'nullable|email',
            'nomor_hp'        => 'nullable|string|max:20',
            'alamat'          => 'required|string',
            'keterangan'      => 'nullable|string',
        ]);

        // Simpan hanya field yang valid
        Peternak::create($request->only([
            'nama_peternak',
            'nama_peternakan',
            'email',
            'nomor_hp',
            'alamat',
            'keterangan',
        ]));

        // Redirect balik ke form dengan pesan sukses
        return back()->with('success', 'Pendaftaran peternakan berhasil! Data Anda akan dicek oleh admin.');
    }
}
