<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Livestock;
//use App\Models\Tawaran;
//use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class PeternakDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil farm milik user (1 user 1 farm)
        $farm = Farm::where('user_id', $user->id)->first();

        // Statistik
        $jumlahTernak = $farm?->livestocks()->count() ?? 0;

        // Tawaran (comment kalau belum ada tabel/model)
        // $jumlahTawaran = Tawaran::where('farm_id', $farm?->id)->count();
        $jumlahTawaran = 0; // default sementara

        $ternakUnggulan = $farm?->livestocks()->orderBy('stok', 'desc')->first();

        // Dummy data grafik kunjungan
        $kunjungan = collect([
            now()->subDays(6)->format('d M') => 5,
            now()->subDays(5)->format('d M') => 8,
            now()->subDays(4)->format('d M') => 4,
            now()->subDays(3)->format('d M') => 12,
            now()->subDays(2)->format('d M') => 7,
            now()->subDay()->format('d M')  => 10,
            now()->format('d M')            => 6,
        ]);

        // Aktivitas terbaru (comment kalau belum ada tabel/model)
        // $activities = Activity::where('farm_id', $farm?->id)
        //     ->latest()
        //     ->take(5)
        //     ->get();
        $activities = collect(); // default sementara

        return view('peternakpage.dashboard', compact(
            'jumlahTernak',
            'jumlahTawaran',
            'ternakUnggulan',
            'kunjungan',
            'activities'
        ));
    }
}
