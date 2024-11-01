@extends('adminlte::page')

@section('title', 'Edit Kelas')

@section('content_header')
<div class="container-fluid bg-white shadow-sm py-4 px-4 mb-4 rounded">
    <div class="d-flex align-items-center">
        <a href="{{route('kelass.index')}}" class="btn btn-light mr-3">
            <i class="fas fa-arrow-left text-muted"></i>
        </a>
        <h1 class="m-0 text-secondary font-weight-bold">Edit Kelas</h1>
    </div>
</div>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{route('kelass.update', $kelas)}}" method="post">
            @method('PUT')
            @csrf
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="form-group mb-4">
                        <label for="nama" class="text-secondary font-weight-bold mb-2">
                            Nama Kelas
                        </label>
                        <input type="text" 
                               class="form-control @error('nama') is-invalid @enderror" 
                               id="nama" 
                               placeholder="Masukkan nama kelas" 
                               name="nama" 
                               value="{{$kelas->nama ?? old('nama')}}"
                               autofocus>
                        @error('nama') 
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{$message}}
                            </div>
                        @enderror
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
    }
    
    .form-control:focus {
        border-color: #90cdf4;
        box-shadow: 0 0 0 0.2rem rgba(144, 205, 244, 0.25);
    }
    
    .card {
        border-radius: 0.5rem;
    }
    
    .btn {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 500;
    }
    
    .btn-success {
        background-color: #48bb78;
        border-color: #48bb78;
    }
    
    .btn-success:hover {
        background-color: #38a169;
        border-color: #38a169;
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

    .invalid-feedback {
        font-size: 0.875rem;
        margin-top: 0.5rem;
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
    
    // Konfirmasi sebelum membatalkan
    $('a[href="{{route('kelass.index')}}"]').on('click', function(e) {
        if ($('.form-control').val() !== '{{$kelas->nama}}') {
            if (!confirm('Perubahan yang Anda buat akan hilang. Lanjutkan?')) {
                e.preventDefault();
            }
        }
    });
});
</script>
@endpush