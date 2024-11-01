@extends('adminlte::page')

@section('title', 'Daftar Kelas')

@section('content_header')
<div class="container-fluid bg-white shadow-lg py-4 px-4 mb-4 rounded">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-primary font-weight-bold">Daftar Kelas</h1>
        <a href="{{route('kelass.create')}}" class="btn btn-primary px-4 d-flex align-items-center btn-add">
            <i class="fas fa-plus-circle mr-2"></i>
            Tambah Kelas
        </a>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="classTable">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-center" width="80px">No.</th>
                                <th>Nama Kelas</th>
                                <th class="text-center" width="200px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kelass as $key => $kelas)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-graduation-cap text-primary mr-2"></i>
                                        <span>{{$kelas->nama}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('kelass.show', $kelas->id) }}" 
                                           class="btn btn-info btn-sm mx-1 btn-action"
                                           data-toggle="tooltip" 
                                           title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('kelass.edit', $kelas)}}" 
                                           class="btn btn-warning btn-sm mx-1 btn-action"
                                           data-toggle="tooltip" 
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm mx-1 btn-action delete-btn"
                                                data-toggle="tooltip" 
                                                title="Hapus"
                                                data-url="{{ route('kelass.destroy', $kelas) }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
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
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus kelas ini?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
            </div>
        </div>
    </div>
</div>
@stop

@push('css')
<style>
    .table thead th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
        border: none;
    }

    .table tbody tr:hover {
        background-color: #f1f5f9;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-action:hover {
        transform: scale(1.1);
    }

    .btn-add:hover {
        box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.15);
    }

    .shadow-lg {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>
@endpush

@push('js')
<script>
$(document).ready(function() {
    $('#classTable').DataTable({
        responsive: true,
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            zeroRecords: "Tidak ada data yang ditemukan",
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",
            infoEmpty: "Tidak ada data yang tersedia",
            infoFiltered: "(difilter dari _MAX_ total data)",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            }
        },
        dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.delete-btn').on('click', function() {
        let deleteUrl = $(this).data('url');
        $('#deleteModal').modal('show');
        $('#confirmDelete').off('click').on('click', function() {
            $('#delete-form').attr('action', deleteUrl);
            $('#delete-form').submit();
        });
    });
});
</script>
@endpush
