@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Input Suara') }}</div>
                <div class="card-body">
                <form method="POST" action="{{ route('suara.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="form-group">
                        <label for="alamat_tps">Alamat TPS</label>
                        <input id="alamat_tps" type="text" class="form-control" name="alamat_tps" value="{{ auth()->user()->tps->alamat_tps }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nomor_tps">Nomor TPS</label>
                        <input id="nomor_tps" type="text" class="form-control" name="nomor_tps" value="{{ auth()->user()->tps->nomor_tps }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_suara">Jumlah Suara</label>
                        <input id="jumlah_suara" type="number" class="form-control @error('jumlah_suara') is-invalid @enderror" name="jumlah_suara" value="{{ old('jumlah_suara') }}" required>
                        @error('jumlah_suara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection