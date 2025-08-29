<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorDashboardController extends Controller
{
    //halaman dashboard vendor
    public function index()
    {
        //data dummy
        $data = [
            ['nama' => 'Kambing Farm', 'lokasi' => 'Lemahbang', 'Jumlah_Domba' => 30],
            ['nama' => 'Kemiren Farm', 'lokasi' => 'Kemiren', 'Jumlah_Domba' => 20],
            ['nama' => 'GlagahArum Farm', 'lokasi' => 'Glagah', 'Jumlah_Domba' => 100],
        ];
        
        return view('vendordashboard', compact('data'));
    }
}
