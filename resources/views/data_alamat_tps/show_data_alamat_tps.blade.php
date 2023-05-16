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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Alamat TPS</h4>
                        <a href="{{ route('alamat-tps.create') }}" class="btn btn-primary float-right">Tambah Alamat TPS</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>No.</th>
                                        <th>Alamat TPS</th>
                                        <th>Jumlah TPS</th>
                                        <th>Jumlah Pemilih</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alamatTps as $key => $at)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $at->alamat_tps }}</td>
                                            <td>{{ $at->tps->count() }}</td>
                                            <td>{{ $at->tps->sum('pemilih_count') }}</td>
                                            <td>
                                                <form action="{{ route('alamat-tps.destroy', $at->id) }}" method="POST">
                                                    <a href="{{ route('alamat-tps.show', $at->id) }}" class="btn btn-info">Lihat</a>
                                                    <a href="{{ route('alamat-tps.edit', $at->id) }}" class="btn btn-success">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                     <!-- Modal -->
                                                    <div class="modal fade" id="hapusModal{{ $at->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{ $at->id }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="hapusModalLabel{{ $at->id }}">Konfirmasi Hapus</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus data ini?
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
