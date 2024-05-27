<a href="<?= base_url('cetak?') . 'pengaduan=' . $id ?>" class="btn btn-sm text-white" style="background-color: #49548E;"><i class="fas fa-print"></i> Cetak PDF</a>
<div class="content">
    <div class="container mt-3">
        <container>
            <div class="form-group mb-3">
                <label for="nomor_pam">Nomor PAM <span class="text-danger">*</span></label>
                <input name="nomor_pam" placeholder="Isikan Nomor PAM Anda" id="nomor_pam" type="text" class="form-control" value="<?= $pengaduan->nomor_pam ?>" disabled>
                <?php echo form_error('nomor_pam', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="nama">Nama <span class="text-danger">*</span></label>
                <input name="nama" placeholder="Isikan Nama Lengkap Anda" id="nama" type="text" class="form-control" value="<?= $pengaduan->nama ?>" disabled>
                <?php echo form_error('nama', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="telepon">No.HP/WA <span class="text-danger">*</span></label>
                <input name="telepon" placeholder="Isikan Nomor Telepon Anda" id="telepon" type="text" class="form-control" value="<?= $pengaduan->telepon ?>" disabled>
                <?php echo form_error('telepon', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email Aktif <span class="text-danger">*</span></label>
                <input name="email" placeholder="Isikan Alamat Email Anda" id="email" type="email" class="form-control" value="<?= $pengaduan->email ?>" disabled>
                <?php echo form_error('email', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="alamat">Alamat</label>
                <input name="alamat" placeholder="Isikan Alamat Lengkap Anda" id="alamat" type="text" class="form-control" value="<?= $pengaduan->alamat ?>" disabled>
                <?php echo form_error('alamat', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="kategori_pengaduan">Kategori Pengaduan</label>
                <select id="kategori_pengaduan" name="kategori_pengaduan" class="form-control" disabled>
                    <option value="">Pilih Kategori Pengaduan</option>
                    <option <?= ($pengaduan->kategori_pengaduan == 'Pipa Bocor') ? 'selected' : ''; ?>>Pipa Bocor</option>
                    <option <?= ($pengaduan->kategori_pengaduan == 'Meter Air') ? 'selected' : ''; ?>>Meter Air</option>
                    <option <?= ($pengaduan->kategori_pengaduan == 'Instalasi Sambungan Rumah') ? 'selected' : ''; ?>>Instalasi Sambungan Rumah</option>
                    <option <?= ($pengaduan->kategori_pengaduan == 'Kualitas Air') ? 'selected' : ''; ?>>Kualitas Air</option>
                    <option <?= ($pengaduan->kategori_pengaduan == 'Pelanggaran') ? 'selected' : ''; ?>>Pelanggaran</option>
                    <option <?= ($pengaduan->kategori_pengaduan == 'Pengaliran Air') ? 'selected' : ''; ?>>Pengaliran Air</option>
                    <option <?= ($pengaduan->kategori_pengaduan == 'Layanan') ? 'selected' : ''; ?>>Layanan</option>
                </select>
                <?php echo form_error('kategori_pengaduan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pengaduan">Tanggal Pengaduan</label>
                <input name="tgl_pengaduan" placeholder="Isikan Alamat Lengkap Anda" id="tgl_pengaduan" type="text" class="form-control" value="<?= date('d-m-Y H:i:s', strtotime($pengaduan->tgl_pengaduan)) ?>" disabled>
                <?php echo form_error('tgl_pengaduan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="isi_pengaduan">Isi Pengaduan</label>
                <textarea class="form-control" placeholder="Isikan Detail Pengaduan Anda" name="isi_pengaduan" id="isi_pengaduan" rows="4" disabled><?= $pengaduan->isi_pengaduan ?></textarea>
                <?php echo form_error('isi_pengaduan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
        </container>
    </div>
</div>
</div>