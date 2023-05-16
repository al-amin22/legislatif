<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tps;
use App\Models\AlamatTps;
use App\Models\User;
class TpsController extends Controller
{
    public function index()
    {
        $tps = Tps::with('alamatTps')->get();
        return view('data_tps.show_data_tps', compact('tps'));
    }

    public function create()
    {
        $alamat_tps = AlamatTps::all();
        return view('data_tps.create_data_tps', compact('alamat_tps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_tps' => 'required',
            //'nama_saksi' => 'required',
            'alamat_tps_id' => 'required',
        ]);

        Tps::create($request->all());

        return redirect()->route('tps.index')->with('success', 'Data Tps Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $tps = Tps::with('alamatTps', 'pemilih')->find($id);
        return view('data_tps.detail_data_tps', compact('tps'));
    }
        
    public function edit($id)
    {
        $tps = Tps::find($id);
        $alamatTps = AlamatTps::all();
        return view('data_tps.edit_data_tps', compact('tps', 'alamatTps'));
    }


    public function update(Request $request, Tps $tps)
    {
        $request->validate([
            'nomor_tps' => 'required',
            'nama_saksi' => 'required',
            'alamat_tps_id' => 'required',
        ]);

        $input = $request->all();

        // Update hanya kolom yang diubah
        $tps->fill($input)->save();

        return redirect()->route('tps.index')->with('success', 'TPS updated successfully');
    }
    
  

    public function destroy(Tps $tps)
    {
        // Check if Tps has relation with AlamatTps
        if ($tps->alamatTps()->exists()) {
            return redirect()->route('tps.index')
                ->with('error', 'Tidak dapat menghapus data silahkan di update');
        }

        $tps->delete();

        return redirect()->route('tps.index')
            ->with('success', 'TPS deleted successfully');

    }

    //tampil input suara tps
    public function indexSuaraTps()
    {
        // ambil data alamat tps dan nomor tps dari user yang telah login
        $alamat_tps = auth()->user()->tps->alamat_tps;
        $nomor_tps = auth()->user()->tps->nomor_tps;

        // tampilkan pesan selamat datang dengan nama user, alamat tps, dan nomor tps
        $nama_user = auth()->user()->name;
        $message = "Selamat datang, $nama_user! Anda berada di TPS dengan alamat $alamat_tps nomor $nomor_tps.";
        session()->flash('message', $message);

        // tampilkan form untuk input data suara
        return view('data_tps.suara_tps', compact('alamat_tps', 'nomor_tps'));
    }

    public function storeSuaraTps(Request $request)
    {
        // validasi input data
        $validatedData = $request->validate([
            'jumlah_suara' => 'required|integer'
        ]);

        // ambil data tps dari user yang telah login
        $tps_id = auth()->user()->tps->id;

        // tambahkan jumlah suara ke tabel tps
        $tps = TPS::findOrFail($tps_id);
        $tps->jumlah_suara += $validatedData['jumlah_suara'];
        $tps->save();

        // tampilkan pesan sukses dan redirect ke halaman input suara
        $message = "Suara berhasil diinputkan.";
        session()->flash('message', $message);
        return redirect()->route('index.suara');
    }
}