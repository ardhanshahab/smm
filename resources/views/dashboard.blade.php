@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 hero text-center">
                    <h1>Welcome to Your Dashboard</h1>
                    <p>This is where you can manage all your data and operations.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-app text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Total Barang</p>
                                        <h4 class="card-title">{{ $totalBarang }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center icon-success">
                                        <i class="nc-icon nc-bank text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Total Departement</p>
                                        <h4 class="card-title">{{ $totalDepartement }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center icon-info">
                                        <i class="nc-icon nc-single-02 text-info"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Total Mitra</p>
                                        <h4 class="card-title">{{ $totalMitra }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Permintaan Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <th>No</th>
                                        <th>Tanggal Permintaan</th>
                                        <th>NIK</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($permintaans as $index => $permintaan)
                                            @if ($index < 3)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $permintaan->tanggal_permintaan }}</td>
                                                    <td>{{ $permintaan->nik }}</td>
                                                    <td>{{ $permintaan->status }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Stok Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($stoks as $index => $stok)
                                            @if ($index < 3)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $stok->nama_barang }}</td>
                                                    <td>{{ $stok->jumlah }}</td>
                                                    <td>{{ $stok->status }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // JavaScript code here
        });
    </script>
@endpush
