@extends('layouts.admin')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Tambah Data TPS
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('tps.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nomor_tps">Nomor TPS</label>
                                <input type="text" name="nomor_tps" class="form-control" id="nomor_tps">
                            </div>
                            <div class="form-group">
                                <label for="nama_saksi">Nama Saksi</label>
                                <input type="text" name="nama_saksi" class="form-control" id="nama_saksi">
                            </div>
                            <div class="form-group">
                                <label for="alamat_tps_id">Alamat TPS</label>
                                <select name="alamat_tps_id" class="form-control" id="alamat_tps_id">
                                    @foreach($alamat_tps as $at)
                                        <option value="{{ $at->id }}">{{ $at->alamat_tps }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
