@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Detail TPS</h1>

        @if(!$tps)
            <p>Data kosong</p>
        @else
            <div class="card">
                <div class="card-header">
                    Nomor TPS: {{ $tps->nomor_tps }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Alamat TPS:</h5>
                    <p class="card-text">{{ $tps->alamatTps->alamat_tps }}</p>
                </div>
            </div>

            <br>

            <h5>Daftar Pemilih:</h5>

            @if($tps->pemilih->count() == 0)
            <div class="alert alert-danger">
                                Data Kosong
                            </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIK Pemilih</th>
                            <th scope="col">Nama Pemilih</th>
                            <th scope="col">Alamat Pemilih</th>
                            <th scope="col">RT Pemilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tps->pemilih as $index => $pemilih)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $pemilih->nik_pemilih }}</td>
                                <td>{{ $pemilih->nama_pemilih }}</td>
                                <td>{{ $pemilih->alamat_pemilih }}</td>
                                <td>{{ $pemilih->rt_pemilih }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endif
    </div>
@endsection
