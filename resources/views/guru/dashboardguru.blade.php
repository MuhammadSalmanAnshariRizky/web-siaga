@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
<div class="container-fluid">
    <!-- Header dengan Logout di pojok kanan atas -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">
            <i class="fas fa-chalkboard-teacher mr-2"></i>Dashboard Guru
        </h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card elevation-2">
                <div class="card-body">
                    <h4>Selamat datang di Dashboard Guru.</h4>
                    <p>Gunakan panel di samping kiri untuk mengelola data siswa dan nilai.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
