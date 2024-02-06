@extends('layouts.app', ['activePage' => 'departement', 'title' => 'PT. SMM (Departement)', 'navName' => 'Data Departement', 'activeButton' => 'masterdata'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Data Departement') }}</h4>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary mx-1 my-1" data-toggle="modal" data-target="#modalCreate">
                                Tambah Data Departement
                            </button>
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Departement</th>
                                        <th>Lokasi Depatement</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $departement)
                                            <tr>
                                                <td>{{ $departement->id }}</td>
                                                <td>{{ $departement->nama_departement }}</td>
                                                <td>{{ $departement->lokasi_departement }}</td>
                                                {{-- <td>{{ $barang->jenis_barang }}</td> --}}
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm mx-1"
                                                        data-toggle="modal"
                                                        data-target="#modalDetail{{ $departement->id }}">Detail</button>

                                                    <button type="button" class="btn btn-warning btn-sm mx-1"
                                                        data-toggle="modal"
                                                        data-target="#modalEdit{{ $departement->id }}">Edit</button>

                                                    <form action="{{ route('departement.destroy', $departement->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                            onclick="return confirm('Anda yakin ingin menghapus?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Modal Detail -->
                                            <div class="modal fade" id="modalDetail{{ $departement->id }}" tabindex="-1"
                                                aria-labelledby="modalDetailLabel{{ $departement->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title"
                                                                id="modalDetailLabel{{ $departement->id }}">Detail
                                                                Departement</h1>
                                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close">x</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Display data detail here -->
                                                            <p>Nama Departement: {{ $departement->nama_departement }}</p>
                                                            <p>Lokasi Departement: {{ $departement->lokasi_departement }}</p>
                                                            {{-- <p>Jenis Barang: {{ $departement->jenis_barang } }</p> --}}
                                                            <!-- Add more fields as needed -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="modalEdit{{ $departement->id }}" tabindex="-1"
                                                aria-labelledby="modalEditLabel{{ $departement->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="modalEditLabel{{ $departement->id }}">
                                                                Edit Data
                                                                Departement</h1>
                                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close">x</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Include the edit form here with the data pre-filled -->
                                                            @include('departement.edit', ['departement' => $departement])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Create -->
            <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="modalCreateLabel">Tambah Departement</h1>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('departement.create')
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
