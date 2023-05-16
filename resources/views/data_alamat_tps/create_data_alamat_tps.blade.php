@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Tambah Alamat TPS
                    </div>
                    <div class="card-body">
                        <form action="{{ route('alamat-tps.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="alamat_tps">Alamat TPS</label>
                                <input type="text" name="alamat_tps" class="form-control" id="alamat_tps" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
