@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <!-- Welcome Card -->
                <div class="col-lg-8">
                    <div class="card text-center bg-danger text-white">
                        <div class="card-body">
                            <img src="{{ asset('assets/img/logosd.png') }}" alt="" class="img-fluid w-25 mb-3">
                            <h6 class="fw-bold"> SELAMAT DATANG </h6>
                            <h4 class="fw-bold"> SISTEM INFORMASI PEMBAYARAN SPP</h4>
                            <p class="mb-0">SEKOLAH DASAR</p>
                        </div>
                    </div>
                </div>
                <!-- End Welcome Card -->
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Total Staff Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card bg-light">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle bg-info text-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="card-title">Total Staff</h5>
                            <h6 class="fw-bold">{{$total_karyawan}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Total Staff Card -->

        <!-- Total Kelas Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card revenue-card bg-light">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle bg-success text-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-building me-2"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="card-title">Total Kelas</h5>
                            <h6 class="fw-bold">{{ $total_kelas}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Total Kelas Card -->

        <!-- Total Siswa Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card customers-card bg-light">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle bg-warning text-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="card-title">Total Siswa</h5>
                            <h6 class="fw-bold">{{$total_student}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Total Siswa Card -->

        <!-- Total SPP Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card customers-card bg-light">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle bg-danger text-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-bookmark"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="card-title">Total SPP</h5>
                            <h6 class="fw-bold">{{$total_spp}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Total SPP Card -->

        <!-- Total Payment Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card customers-card bg-light">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-currency-exchange"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="card-title">Total Payment</h5>
                            <h6 class="fw-bold">{{$total_payment}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Total Payment Card -->
    </div>

</section>
@endsection

