@extends('layouts.app', ['activePage' => 'stok', 'title' => 'PT. SMM (Manajemen Stok Barang)', 'navName' => 'Manajemen Stok Barang', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Stock Barang') }}</h4>
                        </div>
                        <div class="">
                            {{-- <button type="button" class="btn btn-primary mx-1 my-1" data-toggle="modal" data-target="#modalCreate">
                                Tambah Data Departement
                            </button> --}}
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $stock)
                                            <tr>
                                                <td>{{$stock->id }}</td>
                                                <td>{{$stock->nama_barang }}</td>
                                                <td>{{$stock->kode_barang }}</td>
                                                <td>{{$stock->jenis_barang }}</td>
                                                <td>{{$stock->jumlah }}</td>
                                                <td class="text-primary">{{$stock->status }}</td>
                                                {{-- <td>{{ $barang->jenis_barang }}</td> --}}
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm mx-1"
                                                        data-toggle="modal"
                                                        data-target="#modalDetail{{ $stock->id }}">Edit Stok</button>
                                                </td>
                                            </tr>

                                            <!-- Modal Stok -->
                                            <div class="modal fade" id="modalDetail{{ $stock->id }}" tabindex="-1"
                                                aria-labelledby="modalDetailLabel{{ $stock->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title"
                                                                id="modalDetailLabel{{ $stock->id }}">Edit
                                                                Stok Barang </h1>
                                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close">x</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Display data detail here -->
                                                            <p>Nama Barang: {{$stock->nama_barang }}</p>
                                                            <p>Kode Barang: {{$stock->kode_barang }}</p>
                                                            <p>Jenis Barang: {{$stock->jenis_barang }}</p>
                                                            <p>Jumlah: {{$stock->jumlah }}</p>
                                                            <p>Status: {{$stock->status }}</p>

                                                            <!-- Formulir untuk mengubah stok dan status -->
                                                                <form method="POST" action="{{ route('stok.update', $stock->kode_barang) }}">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="mb-3">
                                                                        <label for="new_stock" class="form-label">Ubah Jumlah Stok</label>
                                                                        <input type="number" name="new_stock" id="new_stock" class="form-control" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="new_status" class="form-label">Ubah Status</label>
                                                                        <select name="new_status" id="new_status" class="form-control" required>
                                                                            <option value="Available">Tersedia</option>
                                                                            <option value="Empty">Kosong</option>
                                                                        </select>
                                                                    </div>

                                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                </form>
                                                            <!-- Akhir formulir -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $barang->links() }}
                                </div>
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
            // Javascript method's body can be found in assets/js/demos.js
            // demo.initDashboardPageCharts();
            // demo.showNotification()

        });
    </script>
@endpush
