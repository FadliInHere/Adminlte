
@extends('adminlte::page')

@section('title', 'Data Kelas')

@section('content_header')
    <h1 class="m-0 text-dark font-weight-bold">Data Kelas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0 rounded-lg" style="background-color: #f8f9fa;">
                <div class="card-body p-4">
                    <table class="table table-hover table-bordered table-striped" id="example2">
                        <thead class="text-black">
                            <tr>
                                <th style="width: 5%; text-align: center;">No.</th>
                                <th>ID Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Nama Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($kelass->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    <i class="fas fa-info-circle"></i> Tidak ada kelas yang ditemukan
                                </td>
                            </tr>
                        @else
                            @foreach($kelass as $key => $kelas)
                                <tr class="table-row">
                                    <td class="align-middle text-center">{{ $key + 1 }}</td>
                                    <td class="align-middle">{{ $kelas->id }}</td>
                                    <td class="align-middle font-weight-bold">{{ $kelas->nama_kelas }}</td>
                                    <td class="align-middle">{{ $kelas->nama_siswa ?? 'Belum ada siswa' }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('css')
    <style>
        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-hover tbody tr:hover {
            background-color: #e2e6ea;
            cursor: pointer;
        }

        .table th, .table td {
            vertical-align: middle;
            font-size: 0.9rem;
        }

        .text-muted {
            font-style: italic;
            font-weight: 600;
        }
    </style>
@endpush

@push('js')
    <form action="" id="delete-form" method="post" style="display:none;">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
            "language": {
                "emptyTable": "Tidak ada data yang tersedia di tabel ini"
            }
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush