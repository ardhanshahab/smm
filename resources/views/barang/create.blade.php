<form method="POST" action="{{ route('barang.store') }}">
    @csrf

    <div class="mb-3">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" required>
        <div class="invalid-feedback">
            Harap isi Nama Barang.
        </div>
    </div>

    <div class="mb-3">
        <label for="kode_barang" class="form-label">Kode Barang</label>
        <input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="Kode Barang"
            required>
        <div class="invalid-feedback">
            Harap isi Kode Barang.
        </div>
    </div>

    <div class="mb-3">
        <label for="jenis_barang" class="form-label">Jenis Barang</label>
        <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" placeholder="Jenis Barang"
            required>
        <div class="invalid-feedback">
            Harap isi Jenis Barang.
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
