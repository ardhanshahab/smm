<!-- create.blade.php -->

<form method="POST" action="{{ route('departement.store') }}">
    @csrf

    <div class="mb-3">
        <label for="nama_departement" class="form-label">Nama Departement</label>
        <input type="text" name="nama_departement" id="nama_departement" class="form-control" placeholder="Nama Barang" required>
        <div class="invalid-feedback">
            Harap isi Nama Departement.
        </div>
    </div>

    <div class="mb-3">
        <label for="lokasi_departement" class="form-label">Lokasi Departement</label>
        <input type="text" name="lokasi_departement" id="lokasi_departement" class="form-control" placeholder="Kode Barang" required>
        <div class="invalid-feedback">
            Harap isi Kode Barang.
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
