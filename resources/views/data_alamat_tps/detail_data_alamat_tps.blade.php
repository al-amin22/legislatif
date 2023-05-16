@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Alamat TPS</h4>
                        <a href="{{ route('alamat-tps.index') }}" class="btn btn-primary float-right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Alamat TPS:</h5>
                                <p>{{ $alamatTps->alamat_tps }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5>Daftar TPS:</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor TPS</th>
                                        <th>Jumlah Pemilih</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alamatTps->tps as $key => $tps)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $tps->nomor_tps }}</td>
                                            <td>{{ $tps->pemilih_count }}</td>
                                            <td>
                                                <a href="{{ route('tps.show', $tps->id) }}" class="btn btn-info">Lihat</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
