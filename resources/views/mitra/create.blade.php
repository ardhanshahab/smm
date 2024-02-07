<form method="POST" action="{{ route('mitra.store') }}">
    @csrf
    <div class="mb-3">
        <label for="id_nik" class="form-label">NIK - Nama</label>
        <select class="form-control" name="id_nik" id="id_nik">
            @foreach ($users as $user)
                <option value="{{ $user->nik }}">{{ $user->nik }} - {{ $user->nama }} </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Harap isi Nama Barang.
        </div>
    </div>

    <div class="mb-3">
        <label for="id_departement" class="form-label">Departement</label>
        <select class="form-control" name="id_departement" id="id_departement">
            @foreach ($departements as $dep)
                <option value="{{ $dep->id }}">{{ $dep->nama_departement }} - {{ $dep->lokasi_departement }}
                </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Harap isi Kode Barang.
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
