@extends('layouts.app', ['activePage' => 'mitra', 'title' => 'PT. SMM (Mitra)', 'navName' => 'Mitra', 'activeButton' => 'manajemen'])

@section('content')
    @if (session('success'))
        @include('alerts.success', ['key' => 'success'])
    @endif

    @if (session('error'))
        @include('alerts.error', ['key' => 'error'])
    @endif

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('List Mitra') }}</h4>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary mx-1 my-1" data-toggle="modal"
                                data-target="#modalCreate">
                                Tambah Mitra
                            </button>
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Departement</th>
                                        <th>Lokasi Departement</th>
                                        <th>NIK</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($mitras as $stock)
                                            <tr>
                                                <td>{{ $stock->id }}</td>
                                                <td>{{ $stock->user->nama }}</td>
                                                <td>{{ $stock->departement->nama_departement }}</td>
                                                <td>{{ $stock->departement->lokasi_departement }}</td>
                                                <td>{{ $stock->user->nik }}</td>
                                                {{-- <td>{{ $mitras->jenis_barang }}</td> --}}
                                                <td>
                                                    <form action="{{ route('mitra.destroy', $stock->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                            onclick="return confirm('Anda yakin ingin menghapus?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                            </div>
                            @endforeach
                            </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $mitras->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modalcreate --}}
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg justify-content-center align-items-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="modalCreateLabel">Tambah Mitra</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('mitra.create', [
                                'users' => $users,
                                'departements   ' => $departements,
                            ])
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
