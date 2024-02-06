@extends('layouts.app', ['activePage' => 'user-management', 'title' => 'PT. SMM (User)', 'navName' => 'User Management', 'activeButton' => 'laravel'])

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
                            <button type="button" class="btn btn-primary mx-1 my-1" data-toggle="modal" data-target="#modalCreate">
                                Tambah Barang
                            </button>
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Nomor Handphone</th>
                                        <th>NIK</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->nama }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->nohp }}</td>
                                                <td>{{ $user->nik }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm mx-1"
                                                        data-toggle="modal"
                                                        data-target="#modalDetail{{ $user->id }}">Detail</button>

                                                    @if (auth()->user()->role == "superadmin")
                                                        <button type="button" class="btn btn-warning btn-sm mx-1"
                                                        data-toggle="modal"
                                                        data-target="#modalEdit{{ $user->id }}">Edit</button>
                                                    <form action="{{ route('barang.destroy', $user->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                            onclick="return confirm('Anda yakin ingin menghapus?')">Delete</button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>

                                            <!-- Modal Detail -->
                                            <div class="modal fade" id="modalDetail{{ $user->id }}" tabindex="-1"
                                                aria-labelledby="modalDetailLabel{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title"
                                                                id="modalDetailLabel{{ $user->id }}">Detail
                                                                Barang</h1>
                                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close">x</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Display data detail here -->
                                                            <p>Nama: {{ $user->nama }}</p>
                                                            <p>Role: {{ $user->role }}</p>
                                                            <p>Jenis Kelamin: {{ $user->jenis_kelamin }}</p>
                                                            <p>Tanggal Lahir: {{ $user->tanggal_lahir }}</p>
                                                            <p>Alamat: {{ $user->alamat }}</p>
                                                            <p>Nik: {{ $user->nik }}</p>
                                                            <p>Email: {{ $user->email }}</p>

                                                            <!-- Add more fields as needed -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="modalEdit{{ $user->id }}" tabindex="-1"
                                                aria-labelledby="modalEditLabel{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="modalEditLabel{{ $user->id }}">
                                                                Edit Data
                                                                Barang</h1>
                                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close">x</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Include the edit form here with the data pre-filled -->
                                                            @include('barang.edit', ['barang' => $user])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
            {{ $users->links() }}
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

