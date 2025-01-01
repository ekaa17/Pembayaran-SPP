@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Data Pembayaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Data Pembayaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="d-flex align-items-center justify-content-between m-3">
                            <h5 class="card-title">Total: {{ $payments->count() }} Pembayaran</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPaymentModal">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Data Baru
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable" id="paymentsTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>Nominal Pembayaran</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Petugas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $payment->student->name }}</td>
                                            <td>Rp {{ number_format($payment->amount_paid, 2, ',', '.') }}</td>
                                            <td>{{ $payment->payment_date}}</td>
                                            <td>{{ $payment->staff->name }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editPaymentModal{{ $payment->id }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </button>

                                                <!-- Tombol Hapus -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePaymentModal{{ $payment->id }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editPaymentModal{{ $payment->id }}" tabindex="-1" aria-labelledby="editPaymentModalLabel{{ $payment->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editPaymentModalLabel{{ $payment->id }}">Edit Data Pembayaran</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('data-payments.update', $payment->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="student_id" class="form-label">Nama Siswa</label>
                                                                <select class="form-control" id="student_id" name="student_id" required>
                                                                    @foreach ($students as $student)
                                                                        <option value="{{ $student->id }}" {{ $student->id == $payment->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="spp_id" class="form-label">SPP</label>
                                                                <select class="form-control" id="spp_id" name="spp_id" required>
                                                                    @foreach ($spps as $spp)
                                                                        <option value="{{ $spp->id }}" {{ $spp->id == $payment->spp_id ? 'selected' : '' }}>{{ $spp->description }} - {{ number_format($spp->amount, 2) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="amount_paid" class="form-label">Nominal Pembayaran</label>
                                                                <input type="number" step="0.01" class="form-control" id="amount_paid" name="amount_paid" value="{{ $payment->amount_paid }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="payment_date" class="form-label">Tanggal Pembayaran</label>
                                                                <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ $payment->payment_date }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="staff_id" class="form-label">Petugas</label>
                                                                <select class="form-control" id="staff_id" name="staff_id" required>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->id }}" {{ $staff->id == $payment->staff_id ? 'selected' : '' }}>{{ $staff->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="deletePaymentModal{{ $payment->id }}" tabindex="-1" aria-labelledby="deletePaymentModalLabel{{ $payment->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deletePaymentModalLabel{{ $payment->id }}">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus pembayaran ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('data-payments.destroy', $payment->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="createPaymentModal" tabindex="-1" aria-labelledby="createPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPaymentModalLabel">Tambah Pembayaran Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('data-payments.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Nama Siswa</label>
                            <select class="form-control" id="student_id" name="student_id" required>
                                <option value="">Pilih Student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="spp_id" class="form-label">SPP</label>
                            <select class="form-control" id="spp_id" name="spp_id" required>
                                <option value="">Pilih Spp</option>
                                @foreach ($spps as $spp)
                                    <option value="{{ $spp->id }}">{{ $spp->description }} - {{ number_format($spp->amount, 2) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="amount_paid" class="form-label">Nominal Pembayaran</label>
                            <input type="number" step="0.01" class="form-control" id="amount_paid" name="amount_paid" required>
                        </div>
                        <div class="mb-3">
                            <label for="payment_date" class="form-label">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="staff_id" class="form-label">Petugas</label>
                            <select class="form-control" id="staff_id" name="staff_id" required>
                                <option value="">Pilih Petugas</option>
                                @foreach ($staffs as $staff)
                                    <option value="{{ $staff->id }}" {{ old('staff_id', $payment->staff_id ?? '') == $staff->id ? 'selected' : '' }}>
                                        {{ $staff->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
