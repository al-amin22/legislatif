@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit TPS') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tps.update', $tps->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nomor_tps" class="col-md-4 col-form-label text-md-right">{{ __('Nomor TPS') }}</label>

                                <div class="col-md-6">
                                    <input id="nomor_tps" type="text" class="form-control @error('nomor_tps') is-invalid @enderror" name="nomor_tps" value="{{ old('nomor_tps', $tps->nomor_tps) }}" required autocomplete="nomor_tps" autofocus>

                                    @error('nomor_tps')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama_saksi" class="col-md-4 col-form-label text-md-right">{{ __('Nama Saksi') }}</label>

                                <div class="col-md-6">
                                    <input id="nama_saksi" type="text" class="form-control @error('nama_saksi') is-invalid @enderror" name="nama_saksi" value="{{ old('nama_saksi', $tps->nama_saksi) }}" required autocomplete="nama_saksi">

                                    @error('nama_saksi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat_tps_id" class="col-md-4 col-form-label text-md-right">{{ __('Alamat TPS') }}</label>

                                <div class="col-md-6">
                                    <select id="alamat_tps_id" class="form-control @error('alamat_tps_id') is-invalid @enderror" name="alamat_tps_id" required>
                                        <option value="">-- Pilih Alamat TPS --</option>
                                        @foreach ($alamatTps as $alamat)
                                            <option value="{{ $alamat->id }}" {{ $tps->alamat_tps_id == $alamat->id ? 'selected' : '' }}>{{ $alamat->alamat_tps }}</option>
                                        @endforeach
                                    </select>

                                    @error('alamat_tps_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update TPS') }}
                                    </button>
                                    <a href="{{ route('tps.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection