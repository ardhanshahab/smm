@extends('layouts.app', ['activePage' => 'barang', 'title' => 'PT. SMM (Barang)', 'navName' => 'Data Barang', 'activeButton' => 'masterdata'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Data Barang') }}</h4>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary mx-1 my-1" data-toggle="modal"
                                data-target="#modalCreate">
                                Tambah Barang
                            </button>
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $barang)
                                            <tr>
                                                <td>{{ $barang->id }}</td>
                                                <td>{{ $barang->nama_barang }}</td>
                                                <td>{{ $barang->kode_barang }}</td>
                                                <td>{{ $barang->jenis_barang }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm mx-1"
                                                        data-toggle="modal"
                                                        data-target="#modalDetail{{ $barang->id }}">Detail</button>

                                                    <button type="button" class="btn btn-warning btn-sm mx-1"
                                                        data-toggle="modal"
                                                        data-target="#modalEdit{{ $barang->id }}">Edit</button>

                                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                            onclick="return confirm('Anda yakin ingin menghapus?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Modal Detail -->
                                            <div class="modal fade" id="modalDetail{{ $barang->id }}" tabindex="-1"
                                                aria-labelledby="modalDetailLabel{{ $barang->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title"
                                                                id="modalDetailLabel{{ $barang->id }}">Detail
                                                                Barang</h1>
                                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close">x</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Nama Barang: {{ $barang->nama_barang }}</p>
                                                            <p>Kode Barang: {{ $barang->kode_barang }}</p>
                                                            <p>Jenis Barang: {{ $barang->jenis_barang }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="modalEdit{{ $barang->id }}" tabindex="-1"
                                                aria-labelledby="modalEditLabel{{ $barang->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="modalEditLabel{{ $barang->id }}">
                                                                Edit Data
                                                                Barang</h1>
                                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close">x</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('barang.edit', ['barang' => $barang])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Create -->
            <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg justify-content-center align-items-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="modalCreateLabel">Tambah Barang</h1>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('barang.create')
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


        });
    </script>
@endpush
