@extends('adminlte::page')

@section('title', 'Data Siswa dan Kelas')

@section('content_header')
    <h1 class="m-0 text-dark">Data Siswa & Kelas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Nama Kelas</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($siswas as $key => $siswa)
                            <tr>
                                <td>{{$key+1}}</td>
                                <!-- Sesuaikan nama kolom dengan yang ada di tabel database -->
                                <td>{{$siswa->nama}}</td> <!-- nama siswa -->
                                <td>{{$siswa->nama_kelas}}</td> <!-- nama kelas -->
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
