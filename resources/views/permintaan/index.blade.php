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
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mx-1 my-1" data-toggle="modal"
                            data-target="#modalCreate">
                            Tambah Permintaan Barang
                        </button>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK - Nama</th>
                                            <th>Departement</th>
                                            <th>Tanggal Permintaan</th>
                                            <th>Barang</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($permintaans as $permintaan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $permintaan->nik }} - {{ $permintaan->user->nama }}</td>
                                            <td>{{ $permintaan->departement }}</td>
                                            <td>{{ $permintaan->tanggal_permintaan }}</td>
                                            <td>

                                                @php
                                                    $totalBarang = 0;
                                                @endphp
                                                @foreach ($permintaan->detailPermintaan as $detail)
                                                    {{ $detail->barang->nama_barang }} ({{ $detail->kuantiti }}),
                                                    @php

                                                        $totalBarang += $detail->kuantiti;

                                                    @endphp
                                                @endforeach
                                            </td>
                                            <td>{{ $totalBarang }}</td>
                                            <td>
                                                @php
                                                    $statuses = [];
                                                @endphp
                                                @foreach ($permintaan->detailPermintaan as $detail)
                                                    @php
                                                        $statuses[] = $detail->status;
                                                    @endphp
                                                @endforeach
                                                {{ implode(', ', $statuses) }}
                                            </td>
                                            <td>
                                                @if ($detail->status == "Proses")
                                                    <form action="{{ route('permintaan.destroy', $permintaan->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" disabled class="btn btn-danger btn-sm mx-1"
                                                        onclick="return confirm('Anda yakin ingin menghapus?')">Delete</button>
                                                    </form>
                                                @endif

                                                <td>
                                                    @if ($detail->status == "Proses" ||$detail->status == "Dikirim" ||$detail->status == "terpenuhi")
                                                        <button type="button" class="btn btn-primary btn-sm mx-1"
                                                            data-toggle="modal" data-target="#modalUpdateStatus{{$permintaan->id}}">
                                                            Update Status
                                                        </button>
                                                    @endif
                                                </td>

                                                <div class="modal fade" id="modalUpdateStatus{{$permintaan->id}}" tabindex="-1" aria-labelledby="modalUpdateStatusLabel{{$permintaan->id}}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalUpdateStatusLabel{{$permintaan->id}}">Update Status Permintaan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('permintaan.update', $permintaan->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="new_status{{$permintaan->id}}">Status Baru:</label>
                                                                        <select class="form-control" id="new_status{{$permintaan->id}}" name="new_status">
                                                                            <option value="Proses">Proses</option>
                                                                            <option value="Dikirim">Dikirim</option>
                                                                            <option value="Selesai">Selesai</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{-- Pagination links --}}
                                {{ $permintaans->links() }}
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
                                        <label for="nama_departement" class="col-form-label text-left">Departement:</label>
                                        <input type="text" class="form-control" name="nama_departement"
                                            id="nama_departement" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal_permintaan" class="col-form-label text-left">Tanggal
                                            Permintaan:</label>
                                        <input type="date" class="form-control" name="tanggal_permintaan"
                                            id="tanggal_permintaan">
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
                                                        <select class="form-control" style="width: auto;"
                                                            name="nama_barang[]" id="nama_barang1">
                                                            <option value="">Pilih Barang</option>
                                                            @foreach ($barang as $item)
                                                            @if ($item->jumlah != '0')
                                                                    <option value="{{ $item->kode_barang }}">{{ $item->nama_barang }}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input type="text" class="form-control" name="lokasi[]"
                                                            id="lokasi_departement1" placeholder="Lokasi" readonly></td>
                                                    <td><input type="number" class="form-control" name="tersedia[]"
                                                            id="tersedia1" style="width: 100px;" placeholder="Tersedia"
                                                            readonly></td>
                                                    <td><input type="number" id="kuantiti1" class="form-control"
                                                            style="width: 100px;" name="kuantiti[]" placeholder="kuantiti">
                                                    </td>
                                                    <td><input type="text" class="form-control" value="pak" readonly
                                                            style="width: 100px;" name="satuan[]" placeholder="satuan"></td>
                                                    <td><input type="text" class="form-control" style="width: 100px;"
                                                            name="keterangan[]" value="-" placeholder="keterangan">
                                                    </td>
                                                    <td><input type="text" id="status1" class="form-control"
                                                            style="width: 100px;" name="status[]" placeholder="status">
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm hapus-barang">Hapus</button>
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
        .modal .modal-dialog-xl {
            min-width: 90%;
            min-height: 90%;
            justify-content: center;
        }
    </style>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#nik').change(function() {
                var nik = $(this).val();
                var mitra = @json($mitras->pluck('user.nama', 'user.nik')->toArray());
                var nama_departement = @json($mitras->pluck('departement.nama_departement', 'user.nik')->toArray());
                var lokasi_departement = @json($mitras->pluck('departement.lokasi_departement', 'user.nik')->toArray());
                $('#nama').val(mitra[nik]);
                $('#nama_departement').val(nama_departement[nik]);
                $('#lokasi_departement1').val(lokasi_departement[nik]);
                localStorage.setItem('lokasi',lokasi_departement[nik])
            });

            $(document).on('change', '[id^=nama_barang]', function() {
                var barangId = $(this).val();
                var stok = @json($barang);
                console.log(barangId);


                var selectedStok = stok.find(function(item) {
                    return item.kode_barang === barangId;
                });


                if (selectedStok) {
                    var nomorUrut = $(this).attr('id').replace('nama_barang', '');
                    console.log('no', nomorUrut);
                    $('#tersedia' + nomorUrut).val(selectedStok.jumlah);
                    $('#status' + nomorUrut).val(selectedStok.jumlah === '0' ? 'kosong' : 'terpenuhi');
                } else {
                    var nomorUrut = $(this).attr('id').replace('nama_barang', '');
                    $('#tersedia' + nomorUrut).val('');
                    $('#status' + nomorUrut).val('');
                }
            });

            $('#tambah-barang').click(function() {
                var nomorUrut = $('#barang-container tr').length + 1;
                var row = '<tr>' +
                    '<td>' + nomorUrut + '</td>' +
                    '<td><select class="form-control" style="width: auto;" name="nama_barang[]" id="nama_barang' + nomorUrut + '"><option value="">Pilih Barang</option>@foreach ($barang as $item) @if ($item->jumlah != '0')<option value="{{ $item->kode_barang }}">{{ $item->nama_barang }}</option>@endif @endforeach</select></td>' +
                    '<td><input type="text" class="form-control lokasi-input" name="lokasi[]" id="lokasi_departement' + nomorUrut + '" placeholder="Lokasi" readonly></td>' +
                    '<td><input type="number" class="form-control" name="tersedia[]" id="tersedia' + nomorUrut + '" style="width: 100px;" placeholder="Tersedia" readonly></td>' +
                    '<td><input type="number" class="form-control" id="kuantiti' + nomorUrut + '" style="width: 100px;" name="kuantiti[]" placeholder="kuantiti"></td>' +
                    '<td><input type="text" class="form-control" style="width: 100px;" value="pak" readonly name="satuan[]" placeholder="Satuan"></td>' +
                    '<td><input type="text" class="form-control" style="width: 100px;" name="keterangan[]" value="-" placeholder="Keterangan"></td>' +
                    '<td><input type="text" id="status' + nomorUrut + '" class="form-control" style="width: 100px;" name="status[]" placeholder="status"></td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm hapus-barang">Hapus</button></td>' +
                    '</tr>';
                $('#barang-container').append(row);

                // Ambil data lokasi dari localStorage
                var lokasi = localStorage.getItem('lokasi');
                // Masukkan data lokasi ke dalam kolom input lokasi pada baris baru
                $('#lokasi_departement' + nomorUrut).val(lokasi);

                // Simpan nomorUrut ke dalam localStorage
                localStorage.setItem('nomorUrut', nomorUrut);
                console.log('tambahbarang', nomorUrut);
            });


            $('#barang-container').on('click', '.hapus-barang', function() {
                $(this).closest('tr').remove();
                updateNomorUrut();
            });

            function updateNomorUrut() {
                $('#barang-container tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }

            @if (Auth::user()->role === 'customer')
                $('#nik').prop('disabled', true);
            @endif

            @if (Auth::user()->role === 'customer')
                $('#nik').val('{{ Auth::user()->nik }}').trigger('change');
            @endif

            $('#barang-container').on('change', '[id^="kuantiti"]', function() {
                var nomorUrut = $(this).attr('id').replace('kuantiti', '');
                var tersedia = parseInt($('#tersedia' + nomorUrut).val());
                var kuantiti = parseInt($(this).val());
                console.log(nomorUrut);

                if (kuantiti > tersedia) {
                    alert('Kuantitas tidak boleh melebihi jumlah yang tersedia.');
                    $(this).val('');
                }
            });
        });


    </script>
@endpush
