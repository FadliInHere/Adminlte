@extends('adminlte::page')

@section('title', 'Detail Siswa')

@section('content_header')
<div class="container-fluid bg-white shadow-sm py-4 px-4 mb-4 rounded">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-secondary font-weight-bold">Detail Siswa</h1>
        <a href="{{ route('siswas.index') }}" class="btn btn-default px-4">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="text-primary font-weight-bold">Informasi Siswa</h5>
                    <hr>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Nama:</label>
                        <p id="nama" class="text-muted">{{ $siswa->nama }}</p>
                    </div>

                    <div class="form-group">
                        <label for="nis" class="font-weight-bold">NIS:</label>
                        <p id="nis" class="text-muted">{{ $siswa->nis }}</p>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir" class="font-weight-bold">Tanggal Lahir:</label>
                        <p id="tanggal_lahir" class="text-muted">{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}</p>
                    </div>

                    <div class="form-group">
                        <label for="kelas" class="font-weight-bold">Kelas:</label>
                        <p id="kelas" class="text-muted">{{ $siswa->kelas->nama ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('siswas.index') }}" class="btn btn-default px-4">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@stop

@push('css')
<style>
    .card {
        border-radius: 0.5rem;
    }

    .form-group label {
        font-weight: 600;
        color: #4a5568;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .btn-default {
        background-color: #edf2f7;
        border-color: #e2e8f0;
        color: #4a5568;
    }

    .btn-default:hover {
        background-color: #e2e8f0;
    }

    .shadow-sm {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
</style>
@endpush
