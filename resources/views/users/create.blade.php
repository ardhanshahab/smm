<form method="POST" action="{{ route('user.store') }}">
    @csrf

    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
        <div class="invalid-feedback">
            Harap isi Nama.
        </div>
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-control" id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="customer">Customer</option>
        </select>
        <div class="invalid-feedback">
            Harap pilih Role.
        </div>
    </div>

    <div class="mb-3">
        <label for="no_hp" class="form-label">Nomor HP</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" required>
        <div class="invalid-feedback">
            Harap isi Nomor HP.
        </div>
    </div>

    <div class="mb-3">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-Laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <div class="invalid-feedback">
            Harap pilih Jenis Kelamin.
        </div>
    </div>

    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        <div class="invalid-feedback">
            Harap isi Tanggal Lahir.
        </div>
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        <div class="invalid-feedback">
            Harap isi Alamat.
        </div>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        <div class="invalid-feedback">
            Harap isi Email.
        </div>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <div class="invalid-feedback">
            Harap isi Password.
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
