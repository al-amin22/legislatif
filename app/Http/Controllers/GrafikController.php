<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlamatTps;
use App\Models\Tps;
use App\Models\Pemilih;
use ConsoleTVs\Charts\Facades\Charts;

class GrafikController extends Controller
{
    
    
    public function chart()
    {
        
        $alamatTpsCount = AlamatTps::count();
        $tpsCount = Tps::count();
        $pemilihCount = Pemilih::count();
        
        $data = AlamatTps::with(['tps.pemilih'])->get();
        $chartData = [];
        foreach ($data as $alamatTps) {
            $chartData[$alamatTps->alamat_tps] = $alamatTps->tps->sum('pemilih_count');
        }

        $alamatTps = AlamatTps::with('tps')->get();
        $labels = [];
        $data = [];
    
        foreach ($alamatTps as $at) {
            $labels[] = $at->alamat_tps;
            $data[] = $at->tps->count();
        }
        
        return view('welcome', compact('chartData', 'data', 'labels', 'alamatTpsCount', 'tpsCount', 'pemilihCount'));
    }


}
