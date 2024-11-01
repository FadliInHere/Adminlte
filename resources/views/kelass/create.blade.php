@extends('adminlte::page')

@section('title', 'Tambah Kelas')

@section('content_header')
<div class="container-fluid bg-white shadow-sm py-4 px-4 mb-4 rounded">
    <div class="d-flex align-items-center">
        <a href="{{route('kelass.index')}}" class="btn btn-light mr-3">
            <i class="fas fa-arrow-left text-muted"></i>
        </a>
        <h1 class="m-0 text-secondary font-weight-bold">Tambah Kelas Baru</h1>
    </div>
</div>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{route('kelass.store')}}" method="post">
            @csrf
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <!-- Icon dan Judul Form -->
                    <div class="text-center mb-4">
                        <div class="bg-light rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-graduation-cap fa-2x text-info"></i>
                        </div>
                        <h5 class="text-secondary">Informasi Kelas Baru</h5>
                        <p class="text-muted small">Silahkan isi informasi kelas yang akan ditambahkan</p>
                    </div>

                    <!-- Form Input -->
                    <div class="form-group mb-4">
                        <label for="nama" class="text-secondary font-weight-bold mb-2">
                            <i class="fas fa-chalkboard text-info mr-2"></i>
                            Nama Kelas
                        </label>
                        <input type="text" 
                               class="form-control @error('nama') is-invalid @enderror" 
                               id="nama" 
                               placeholder="Masukkan nama kelas" 
                               name="nama" 
                               value="{{old('nama')}}"
                               autofocus>
                        @error('nama') 
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{$message}}
                            </div>
                        @enderror
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle mr-1"></i>
                            Contoh: X IPA 1, XI IPS 2, XII Bahasa
                        </small>
                    </div>
                </div>

                <div class="card-footer bg-white border-top py-3 px-4">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('kelass.index')}}" class="btn btn-secondary mr-2">
                            <i class="fas fa-times mr-1"></i>
                            Batal
                        </a>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fas fa-save mr-1"></i>
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@push('css')
<style>
    .form-control {
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        font-size: 0.95rem;
        background-color: #f8fafc;
    }
    
    .form-control:focus {
        background-color: #ffffff;
        border-color: #90cdf4;
        box-shadow: 0 0 0 0.2rem rgba(144, 205, 244, 0.25);
    }
    
    .card {
        border-radius: 0.5rem;
        overflow: hidden;
    }
    
    .btn {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .btn-success {
        background-color: #48bb78;
        border-color: #48bb78;
    }
    
    .btn-success:hover {
        background-color: #38a169;
        border-color: #38a169;
        transform: translateY(-1px);
    }
    
    .btn-secondary {
        background-color: #edf2f7;
        border-color: #edf2f7;
        color: #4a5568;
    }
    
    .btn-secondary:hover {
        background-color: #e2e8f0;
        border-color: #e2e8f0;
        color: #2d3748;
    }
    
    .shadow-sm {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    .text-info {
        color: #4299e1 !important;
    }

    .bg-light {
        background-color: #f7fafc !important;
    }

    .invalid-feedback {
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    /* Animasi hover pada card */
    .card:hover {
        transform: translateY(-2px);
        transition: transform 0.2s ease-in-out;
    }
</style>
@endpush

@push('js')
<script>
$(document).ready(function() {
    // Animasi smooth pada focus input
    $('.form-control').on('focus', function() {
        $(this).closest('.form-group').addClass('focused');
    }).on('blur', function() {
        $(this).closest('.form-group').removeClass('focused');
    });
    
    // Konfirmasi sebelum membatalkan jika ada isian
    $('a[href="{{route('kelass.index')}}"]').on('click', function(e) {
        if ($('#nama').val() !== '') {
            if (!confirm('Data yang Anda masukkan akan hilang. Lanjutkan?')) {
                e.preventDefault();
            }
        }
    });

    // Auto capitalize input
    $('#nama').on('input', function() {
        let val = $(this).val();
        $(this).val(val.charAt(0).toUpperCase() + val.slice(1));
    });
});
</script>
@endpush