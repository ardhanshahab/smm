@extends('layouts.app', ['activePage' => 'permintaan', 'title' => 'PT. SMM (Permintaan Barang)', 'navName' => 'Permintaan', 'activeButton' => 'manajemen'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('List Permintaan') }}</h4>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary mx-1 my-1" data-toggle="modal" data-target="#modalCreate">
                                Tambah Permintaan Barang
                            </button>
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>NIK - Nama</th>
                                        <th>Departement</th>
                                        <th>Tanggal Permintaan</th>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{-- {{ $barang->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Create -->
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalCreateLabel">Tambah Barang</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('permintaan.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="nik" class="col-form-label text-left">Nik:</label>
                                        <select class="form-control" name="nik" id="nik">
                                            <option value="">Pilih NIK</option>
                                            @foreach ($mitras as $mitra)
                                                <option value="{{ $mitra->user->nik }}">{{ $mitra->user->nik }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nama" class="col-form-label text-left">Nama:</label>
                                        <input type="text" class="form-control" name="nama" id="nama" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="departement" class="col-form-label text-left">Departement:</label>
                                        <input type="text" class="form-control" name="departement" id="departement" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal_permintaan" class="col-form-label text-left">Tanggal Permintaan:</label>
                                        <input type="date" class="form-control" name="tanggal_permintaan" id="tanggal_permintaan">
                                    </div>
                                </div>
                                <div class="row p-1 m-1">
                                    <h5 class="col-12">Daftar Barang</h5>
                                    <div class="col-md-12" style="overflow-x: scroll">
                                        <table class="table tabel table-responsive" id="tabel">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Barang</th>
                                                    <th>Lokasi</th>
                                                    <th>Tersedia</th>
                                                    <th>Kuantiti</th>
                                                    <th>Satuan</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                    <th>*</th>
                                                </tr>
                                            </thead>
                                            <tbody id="barang-container">
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <!-- Ganti input nama barang dengan select2 -->
<td>
    <select class="form-control" name="nama_barang[]">
        <option value="">Pilih Barang</option>
        @foreach ($barang as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
    </select>
</td>

                                                    </td>
                                                    <td><input type="number" name="jumlah[]" placeholder="Jumlah"></td>
                                                    <td><input type="number" name="tersedia[]" placeholder="Tersedia"></td>
                                                    <td><input type="number" name="kuantiti[]" placeholder="kuantiti"></td>
                                                    <td><input type="number" name="satuan[]" placeholder="satuan"></td>
                                                    <td><input type="number" name="keterangan[]" placeholder="keterangan"></td>
                                                    <td><input type="number" name="status[]" placeholder="status"></td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm hapus-barang">Hapus</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <button type="button" id="tambah-barang" class="btn btn-success">Tambah Barang</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .modal .modal-dialog-xl{
     min-width: 90%;
     min-height: 90%;
     justify-content: center;
    }
    div table thead tr th{
        width: auto;
        /* overflow-x: scroll; */
    }
    .tabel {
        width: 10px;
    }
</style>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#nik').change(function() {
                var nik = $(this).val();
                var mitra = @json($mitras->pluck('user.nama', 'user.nik')->toArray());
                var departement = @json($mitras->pluck('departement.nama_departement', 'user.nik')->toArray());
                $('#nama').val(mitra[nik]);
                $('#departement').val(departement[nik]);
            });

            var nomorUrut = 1;

            $('#tambah-barang').click(function() {
                nomorUrut++;
                var row = '<tr>' +
                    '<td>' + nomorUrut + '</td>' +
                    '<td><input type="text" name="nama_barang[]" placeholder="Nama Barang"></td>' +
                    '<td><input type="number" name="jumlah[]" placeholder="Jumlah"></td>' +
                    '<td><input type="number" name="tersedia[]" placeholder="Tersedia"></td>' +
                    '<td><input type="number" name="kuantiti[]" placeholder="kuantiti"></td>' +
                    '<td><input type="number" name="satuan[]" placeholder="satuan"></td>' +
                    '<td><input type="number" name="keterangan[]" placeholder="keterangan"></td>' +
                    '<td><input type="number" name="status[]" placeholder="status"></td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm hapus-barang">Hapus</button></td>' +
                    '</tr>';
                $('#barang-container').append(row);

                $('#barang-container').on('click', '.hapus-barang', function() {
                    $(this).closest('tr').remove();
                    updateNomorUrut();
                });

                function updateNomorUrut() {
                    $('#barang-container tr').each(function(index) {
                        $(this).find('td:first').text(index + 1);
                    });
                }
            });

            // Disable NIK input if user is a customer
            @if(Auth::user()->role === 'customer')
                $('#nik').prop('disabled', true);
            @endif

            // Set NIK automatically if user is a customer
            @if(Auth::user()->role === 'customer')
                $('#nik').val('{{ Auth::user()->nik }}').trigger('change');
            @endif
        });
    </script>
@endpush
