<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;
use Illuminate\Support\Facades\Auth;

class VendorDashboardController extends Controller
{
    public function index()
    {
        
        $userId = Auth::id();

        
        $farms = Farm::with('livestocks')->get();


        return view('vendor.dashboard', compact('farms'));
    }
}
