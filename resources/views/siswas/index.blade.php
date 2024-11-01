@extends('adminlte::page')

@section('title', 'Daftar Siswa')

@section('content_header')
<div class="container-fluid bg-primary text-white shadow-sm py-4 px-4 mb-4 rounded">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 font-weight-bold">Daftar Siswa</h1>
        <a href="{{ route('siswas.create') }}" class="btn btn-light text-primary px-4">
            <i class="fas fa-user-plus mr-2"></i> Tambah Siswa
        </a>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-lg border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover text-center" id="siswaTable">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th width="70">No</th>
                                <th>Nama Siswa</th>
                                <th>NIS</th>
                                <th>Tanggal Lahir</th>
                                <th>Kelas</th>
                                <th width="200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($siswas as $key => $siswa)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="avatar-circle bg-info text-white mr-2">
                                            <span class="initials">{{ substr($siswa->nama, 0, 1) }}</span>
                                        </div>
                                        <span>{{ $siswa->nama }}</span>
                                    </div>
                                </td>
                                <td><span class="badge badge-primary">{{ $siswa->nis }}</span></td>
                                <td><i class="far fa-calendar-alt text-info mr-1"></i>{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d M Y') }}</td>
                                <td><i class="fas fa-graduation-cap text-success mr-2"></i>{{ $siswa->kelas->nama ?? 'Belum ada kelas' }}</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <a href="{{ route('siswas.show', $siswa->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Detail"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('siswas.edit', $siswa) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-toggle="tooltip" title="Hapus" data-url="{{ route('siswas.destroy', $siswa) }}"><i class="fas fa-trash"></i></button>
                                    </div>
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

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-danger">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Yakin ingin menghapus data siswa ini?</p>
                <small class="text-danger">Tindakan ini tidak dapat dibatalkan</small>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
            </div>
        </div>
    </div>
</div>

<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@stop

@push('css')
<style>
    .avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .badge {
        padding: 0.5em 1em;
        font-weight: 500;
        border-radius: 0.375rem;
    }

    .table-hover tbody tr:hover {
        background-color: #e2e8f0;
        cursor: pointer;
    }
</style>
@endpush

@push('js')
<script>
$(document).ready(function() {
    $('.delete-btn').on('click', function() {
        let deleteUrl = $(this).data('url');
        $('#deleteModal').modal('show');
        $('#confirmDelete').off('click').on('click', function() {
            $('#delete-form').attr('action', deleteUrl);
            $('#delete-form').submit();
        });
    });

    $('#siswaTable').DataTable({
        responsive: true,
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: { first: "Pertama", last: "Terakhir", next: ">", previous: "<" }
        }
    });

    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endpush
