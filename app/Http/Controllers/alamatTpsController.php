<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlamatTps;

class alamatTpsController extends Controller

    {
        public function index()
        {
            $alamatTps =AlamatTps::orderByDesc('created_at')->get();
           
            return view('data_alamat_tps.show_data_alamat_tps', compact('alamatTps'));
        }
    
        public function create()
        {
            return view('data_alamat_tps.create_data_alamat_tps');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'alamat_tps' => 'required',
            ]);
    
            AlamatTps::create($request->all());
    
            return redirect()->route('alamat-tps.index')
                ->with('success', 'Alamat TPS created successfully.');
        }
    
        public function show($id)
        {
            $alamatTps = AlamatTps::findOrFail($id);
    
            return view('data_alamat_tps.detail_data_alamat_tps', compact('alamatTps'));
        }
    
        public function edit($id)
        {
            $alamatTps = AlamatTps::find($id);
            return view('data_alamat_tps.edit_data_alamat_tps', compact('alamatTps'));
        }

        public function update(Request $request, $id)
        {
            $alamatTps = AlamatTps::find($id);
            $alamatTps->alamat_tps = $request->alamat_tps;
            $alamatTps->save();

            return redirect()->route('alamat-tps.index')->with('success', 'Alamat TPS berhasil diupdate');
        }

        public function destroy($id)
        {
            $alamatTps = AlamatTps::findOrFail($id);

             // check if the data has any relationships
            if ($alamatTps->tps->count() > 0) {
                return back()->with('error', 'Data tidak bisa dihapus karena memiliki keterkaitan dengan tabel TPS');
            }

            $alamatTps->delete();

            return redirect()->route('alamat-tps.index')->with('success', 'Data berhasil dihapus');
        }
    }