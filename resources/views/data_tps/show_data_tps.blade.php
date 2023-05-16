@extends('layouts.admin')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">Daftar TPS</div>
                    <a href="{{ route('tps.create') }}" class="btn btn-primary float-right">Tambah Data</a>
                    <div class="card-body">
                    

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nomor TPS</th>
                                    <th scope="col">Nama Saksi</th>
                                    <th scope="col">Alamat TPS</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tps as $tps)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $tps->nomor_tps }}</td>
                                        <td>{{ $tps->nama_saksi }}</td>
                                        <td>{{ $tps->alamatTps->alamat_tps }}</td>
                                        <td>
                                            <a href="{{ route('tps.show', $tps->id) }}" class="btn btn-primary">Lihat</a>
                                            <a href="{{ route('tps.edit', $tps->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('tps.destroy', $tps->id) }}" method="POST" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus TPS ini?')">Hapus</button>
                                            </form>
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

@endsection