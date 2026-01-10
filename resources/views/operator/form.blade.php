<div class="row g-3">

    <div class="col-md-6">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control"
            value="{{ old('nim', $mahasiswa->nim ?? '') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
            value="{{ old('email', $mahasiswa->email ?? '') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Nama Mahasiswa</label>
        <input type="text" name="nama_mahasiswa" class="form-control"
            value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa ?? '') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Nomor HP</label>
        <input type="text" name="nomor_hp" class="form-control"
            value="{{ old('nomor_hp', $mahasiswa->nomor_hp ?? '') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Fakultas</label>
        <select name="fakultas" class="form-select">
            <option value="">-- Pilih --</option>
            <option value="informatika" @selected(old('fakultas', $mahasiswa->fakultas ?? '')=='informatika')>
                Informatika
            </option>
            <option value="bisnis" @selected(old('fakultas', $mahasiswa->fakultas ?? '')=='bisnis')>
                Bisnis
            </option>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">Prodi</label>
        <input type="text" name="prodi" class="form-control"
            value="{{ old('prodi', $mahasiswa->prodi ?? '') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Kategori Kelas</label>
        <select name="kategori_kelas" class="form-select">
            <option value="pagi" @selected(old('kategori_kelas', $mahasiswa->kategori_kelas ?? '')=='pagi')>Pagi</option>
            <option value="sore" @selected(old('kategori_kelas', $mahasiswa->kategori_kelas ?? '')=='sore')>Sore</option>
        </select>
    </div>

</div>
