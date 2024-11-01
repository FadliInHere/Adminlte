@extends('adminlte::page')

@section('title', 'Detail Kelas')

@section('content_header')
<div class="container-fluid bg-white shadow-sm py-4 px-4 mb-4 rounded">
    <div class="d-flex align-items-center">
        <a href="{{route('kelass.index')}}" class="btn btn-light mr-3">
            <i class="fas fa-arrow-left text-muted"></i>
        </a>
        <h1 class="m-0 text-secondary font-weight-bold">Detail Kelas</h1>
    </div>
</div>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <i class="fas fa-graduation-cap fa-2x text-info mr-3"></i>
                    <h5 class="font-weight-bold text-secondary m-0">Informasi Kelas</h5>
                </div>
                
                <div class="bg-light p-4 rounded-lg mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="detail-item">
                                <label class="text-muted mb-2">ID Kelas</label>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-hashtag text-info mr-2"></i>
                                    <p class="h5 m-0 text-secondary">{{ $kelas->id }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="detail-item">
                                <label class="text-muted mb-2">Nama Kelas</label>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-chalkboard text-info mr-2"></i>
                                    <p class="h5 m-0 text-secondary">{{ $kelas->nama }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="text-muted mb-2">Status</label>
                        <div class="d-flex align-items-center">
                            <span class="badge badge-success px-3 py-2">
                                <i class="fas fa-check-circle mr-1"></i>
                                Aktif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Metadata -->
                <div class="border-top pt-4">
                    <div class="row text-muted">
                        <div class="col-md-6">
                            <small>
                                <i class="fas fa-clock mr-1"></i>
                                Dibuat: {{ $kelas->created_at ? $kelas->created_at->format('d M Y H:i') : '-' }}
                            </small>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <small>
                                <i class="fas fa-edit mr-1"></i>
                                Diperbarui: {{ $kelas->updated_at ? $kelas->updated_at->format('d M Y H:i') : '-' }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white border-top py-3 px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('kelass.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Kembali
                    </a>
                    <div>
                        <a href="{{ route('kelass.edit', $kelas->id) }}" class="btn btn-info">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </a>
                    </div>
                </div>
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
    
    .btn {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 500;
    }
    
    .badge {
        font-weight: 500;
        font-size: 0.875rem;
        border-radius: 0.375rem;
    }
    
    .badge-success {
        background-color: #48bb78;
        color: white;
    }
    
    .text-info {
        color: #4299e1 !important;
    }
    
    .text-secondary {
        color: #4a5568 !important;
    }
    
    .text-muted {
        color: #718096 !important;
    }
    
    .bg-light {
        background-color: #f7fafc !important;
    }
    
    .shadow-sm {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
    
    .detail-item label {
        font-size: 0.875rem;
        font-weight: 500;
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
    
    .btn-info {
        background-color: #4299e1;
        border-color: #4299e1;
    }
    
    .btn-info:hover {
        background-color: #3182ce;
        border-color: #3182ce;
    }
</style>
@endpush

@push('js')
<script>
$(document).ready(function() {
    // Animasi hover pada card
    $('.card').hover(
        function() {
            $(this).addClass('shadow-md transition-shadow duration-300');
        },
        function() {
            $(this).removeClass('shadow-md');
        }
    );
});
</script>
@endpush