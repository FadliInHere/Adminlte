@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
<div class="container-fluid bg-white shadow-sm py-4 px-4 mb-4 rounded">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-secondary font-weight-bold">Tambah Siswa</h1>
        <a href="{{ route('siswas.index') }}" class="btn btn-default px-4">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>
</div>
@stop

@section('content')
<form action="{{ route('siswas.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputNama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputNama" placeholder="Nama lengkap" name="nama" value="{{ old('nama') }}">
                        @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputNIS">NIS</label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="exampleInputNIS" placeholder="Masukkan NIS" name="nis" value="{{ old('nis') }}">
                        @error('nis') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputTanggalLahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="exampleInputTanggalLahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputKelas">Kelas</label>
                        <select class="form-control @error('id_kelas') is-invalid @enderror" id="exampleInputKelas" name="id_kelas">
                            <option value="">Pilih Kelas</option>
                            @foreach($kelass as $kelas)
                            <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_kelas') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                    <a href="{{ route('siswas.index') }}" class="btn btn-default px-4">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
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

    .form-control {
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        padding: 0.75rem;
    }

    .btn-primary {
        background-color: #48bb78;
        border-color: #48bb78;
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
