<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use App\Models\Offer;
use App\Models\Visit;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class PeternakDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Statistik
        $jumlahTernak   = Livestock::where('user_id', $user->id)->count();
        $jumlahTawaran  = Offer::whereHas('livestock', fn($q) => $q->where('user_id', $user->id))->count();
        $ternakUnggulan = Livestock::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        // Grafik kunjungan (7 hari terakhir)
        $kunjungan = Visit::where('user_id', $user->id)
            ->where('created_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(created_at) as tanggal, count(*) as total')
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        // Aktivitas terbaru
        $activities = Activity::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('peternak.dashboard', compact(
            'jumlahTernak',
            'jumlahTawaran',
            'ternakUnggulan',
            'kunjungan',
            'activities'
        ));
    }
}
