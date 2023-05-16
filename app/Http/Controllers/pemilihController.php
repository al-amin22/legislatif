<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pemilih;
use App\Models\Tps;
use App\Models\AlamatTps;

class pemilihController extends Controller
{
    public function index()
    {
        $pemilih = Pemilih::with('tps.alamatTps')->get();
        $pemilih = Pemilih::orderByDesc('created_at')->get();
        return view('data_pemilih.show_data_pemilih', compact('pemilih'));
    }

    public function create()
    {
        
        $alamat_tps = AlamatTps::all();
   
        return view('data_pemilih.create_data_pemilih', compact('alamat_tps'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nik_pemilih' => 'required',
            'nama_pemilih' => 'required',
            'alamat_pemilih' => 'required',
            'rt_pemilih' => 'required',
            'alamat_tps_id' => 'required',
            'nomor_tps' => 'required'
        ]);

        $tps = Tps::where('id', $request->nomor_tps)->first();
        
        $pemilih = new Pemilih;
        $pemilih->nik_pemilih = $request->nik_pemilih;
        $pemilih->nama_pemilih = $request->nama_pemilih;
        $pemilih->alamat_pemilih = $request->alamat_pemilih;
        $pemilih->rt_pemilih = $request->rt_pemilih;
        $pemilih->tps()->associate($tps);
        $pemilih->save();
        

        return redirect()->route('pemilih.index')->with('success', 'Data pemilih berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $pemilih = Pemilih::with('tps.alamatTps')->find($id);
        $alamat_tps = AlamatTps::all();
        return view('data_pemilih.edit_data_pemilih', compact('pemilih', 'alamat_tps'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik_pemilih' => 'required',
            'nama_pemilih' => 'required',
            'alamat_pemilih' => 'required',
            'rt_pemilih' => 'required',
            'alamat_tps_id' => 'required',
            'nomor_tps' => 'required'
        ]);
    
        $tps = Tps::where('id', $request->nomor_tps)->first();
    
        $pemilih = Pemilih::find($id);
        $pemilih->nik_pemilih = $request->nik_pemilih;
        $pemilih->nama_pemilih = $request->nama_pemilih;
        $pemilih->alamat_pemilih = $request->alamat_pemilih;
        $pemilih->rt_pemilih = $request->rt_pemilih;
        $pemilih->tps()->associate($tps);
        $pemilih->save();
    
        return redirect()->route('pemilih.index')->with('success', 'Data pemilih berhasil diupdate.');
    }
    

    public function destroy(Pemilih $pemilih)
    {
        $pemilih->delete();
        return redirect()->route('pemilih.index')->with('success', 'Data pemilih berhasil dihapus.');
    }

    public function getNomorTps($id)
    {
        $tps = Tps::where('alamat_tps_id', $id)->get();
        return response()->json($tps);
    }
}
