<form method="POST" action="{{ route('departement.update', $departement->id) }}">
    @csrf
    @method('PATCH')

    <div class="mb-3">
        <label for="nama_departement" class="form-label">Nama Departement</label>
        <input type="text" name="nama_departement" id="nama_departement" class="form-control" placeholder="Nama Barang"
            value="{{ $departement->nama_departement }}" required>
        <div class="invalid-feedback">
            Harap isi Nama Departement.
        </div>
    </div>

    <div class="mb-3">
        <label for="lokasi_departement" class="form-label">Lokasi Departement</label>
        <input type="text" name="lokasi_departement" id="lokasi_departement" class="form-control"
            placeholder="Kode Barang" value="{{ $departement->lokasi_departement }}" required>
        <div class="invalid-feedback">
            Harap isi Lokasi Departement.
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
