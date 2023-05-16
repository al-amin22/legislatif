@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Tambah Data Pemilih</div>

                    <div class="card-body">
                        <form action="{{ route('pemilih.store') }}" method="POST">
                            @csrf

                            @csrf
                            <div class="form-group">
                                <label for="nik_pemilih">NIK Pemilih</label>
                                <input type="text" class="form-control" id="nik_pemilih" name="nik_pemilih">
                            </div>
                            <div class="form-group">
                                <label for="nama_pemilih">Nama Pemilih</label>
                                <input type="text" class="form-control" id="nama_pemilih" name="nama_pemilih">
                            </div>
                            <div class="form-group">
                                <label for="alamat_pemilih">Alamat Pemilih</label>
                                <input type="text" class="form-control" id="alamat_pemilih" name="alamat_pemilih">
                            </div>
                            <div class="form-group">
                                <label for="rt_pemilih">RT Pemilih</label>
                                <input type="text" class="form-control" id="rt_pemilih" name="rt_pemilih">
                            </div>
                            <div class="form-group">
                                <label for="id_tps">TPS</label>
                                <select name="alamat_tps_id" id="alamat_tps_id">
                                    <option value="">-- Pilih Alamat TPS --</option>
                                    @foreach($alamat_tps as $at)
                                        <option value="{{ $at->id }}">{{ $at->alamat_tps }}</option>
                                    @endforeach
                                </select>
                                @error('id_tps')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nomor_tps">Nomor TPS</label>
                                <select name="nomor_tps" id="nomor_tps">
                                    <option value="">-- Pilih Nomor TPS --</option>
                                </select>
                            </div>

                            <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                            <a href="{{ route('pemilih.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#alamat_tps_id').on('change', function() {
        var alamat_tps_id = $(this).val();
        if (alamat_tps_id) {
            $.ajax({
                url: '/tps/getNomorTps/' + alamat_tps_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#nomor_tps').empty();
                    $('#nomor_tps').append('<option value="">-- Pilih Nomor TPS --</option>');
                    $.each(data, function(key, value) {
                        $('#nomor_tps').append('<option value="' + value.id + '">' + value.nomor_tps + '</option>');
                    });
                }
            });
        } else {
            $('#nomor_tps').empty();
            $('#nomor_tps').append('<option value="">-- Pilih Nomor TPS --</option>');
        }
    });
});
</script>


    
@endsection
