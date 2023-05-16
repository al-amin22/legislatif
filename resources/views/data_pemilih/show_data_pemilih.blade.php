@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pemilih</h4>
                    <a href="{{ route('pemilih.create') }}" class="btn btn-primary float-right">Tambah Data</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIK Pemilih</th>
                                    <th>Nama Pemilih</th>
                                    <th>Alamat Pemilih</th>
                                    <th>RT Pemilih</th>
                                    <th>Alamat TPS</th>
                                    <th>Nomor TPS</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemilih as $key => $data)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $data->nik_pemilih }}</td>
                                        <td>{{ $data->nama_pemilih }}</td>
                                        <td>{{ $data->alamat_pemilih }}</td>
                                        <td>{{ $data->rt_pemilih }}</td>
                                        <td>{{ $data->tps->alamatTps->alamat_tps }}</td>
                                        <td>{{ $data->tps->nomor_tps }}</td>
                                        <td>
                                            <a href="{{ route('pemilih.edit',$data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('pemilih.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Hapus</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus data pemilih ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
</div>
@endsection
