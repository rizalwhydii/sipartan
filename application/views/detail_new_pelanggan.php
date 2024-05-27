<a href="<?= base_url('report?np=' . $pelanggan->id) ?>" class="btn btn-sm text-white" style="background-color: #49548E;"><i class="fas fa-print"></i> Cetak PDF</a>
<div class="content">
    <div class="container mt-3">
        <container>
            <div class="form-group mb-3">
                <label for="id_daftar">ID Daftar</label>
                <input name="id_daftar" placeholder="Isikan Nama Lengkap Anda" id="id_daftar" type="text" class="form-control" value="<?= $pelanggan->id; ?>" disabled>
                <?php echo form_error('id_daftar', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <input name="nama" placeholder="Isikan Nama Lengkap Anda" id="nama" type="text" class="form-control" value="<?= $pelanggan->nama; ?>" disabled>
                <?php echo form_error('nama', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="telepon">Telepon</label>
                <input name="telepon" placeholder="Isikan Nomor Telepon Anda" id="telepon" type="text" class="form-control" value="<?= $pelanggan->telepon; ?>" disabled>
                <?php echo form_error('telepon', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="alamat">Alamat</label>
                <input name="alamat" placeholder="Isikan Alamat Lengkap Anda" id="alamat" type="text" class="form-control" value="<?= $pelanggan->alamat; ?>" disabled>
                <?php echo form_error('alamat', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="rt">RT</label>
                        <input name="rt" placeholder="Isikan Alamat RT Anda" id="rt" type="text" class="form-control" value="<?= $pelanggan->rt; ?>" disabled>
                        <?php echo form_error('rt', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="rw">RW</label>
                        <input name="rw" placeholder="Isikan Alamat RW Anda" id="rw" type="text" class="form-control" value="<?= $pelanggan->rw; ?>" disabled>
                        <?php echo form_error('rw', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="kecamatan">Kecamatan</label>
                <select id="kecamatan" name="kecamatan" class="form-control" disabled>
                    <option value="">Pilih Kecamatan</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Brangsong') ? 'selected' : ''; ?>>Kecamatan Brangsong</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Boja') ? 'selected' : ''; ?>>Kecamatan Boja</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Cepiring') ? 'selected' : ''; ?>>Kecamatan Cepiring</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Gemuh') ? 'selected' : ''; ?>>Kecamatan Gemuh</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Kaliwungu') ? 'selected' : ''; ?>>Kecamatan Kaliwungu</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Kaliwungu Selatan') ? 'selected' : ''; ?>>Kecamatan Kaliwungu Selatan</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Kangkung') ? 'selected' : ''; ?>>Kecamatan Kangkung</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Kendal') ? 'selected' : ''; ?>>Kecamatan Kendal</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Limbangan') ? 'selected' : ''; ?>>Kecamatan Limbangan</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Ngampel') ? 'selected' : ''; ?>>Kecamatan Ngampel</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Plantungan') ? 'selected' : ''; ?>>Kecamatan Plantungan</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Pageruyung') ? 'selected' : ''; ?>>Kecamatan Pageruyung</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Patean') ? 'selected' : ''; ?>>Kecamatan Patean</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Patebon') ? 'selected' : ''; ?>>Kecamatan Patebon</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Pegandon') ? 'selected' : ''; ?>>Kecamatan Pegandon</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Ringinarum') ? 'selected' : ''; ?>>Kecamatan Ringinarum</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Rowosari') ? 'selected' : ''; ?>>Kecamatan Rowosari</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Singorojo') ? 'selected' : ''; ?>>Kecamatan Singorojo</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Sukorejo') ? 'selected' : ''; ?>>Kecamatan Sukorejo</option>
                    <option <?= ($pelanggan->kecamatan == 'Kecamatan Weleri') ? 'selected' : ''; ?>>Kecamatan Weleri</option>
                </select>
                <?php echo form_error('kecamatan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="kelurahan">Kelurahan</label>
                <input name="kelurahan" placeholder="Isikan Alamat Kelurahan Anda" id="kelurahan" type="text" class="form-control" value="<?= $pelanggan->kelurahan; ?>>" disabled>
                <?php echo form_error('kelurahan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="kode_pos">Kode Pos</label>
                <input name="kode_pos" placeholder="Isikan Nomor Kode Pos Anda" id="kode_pos" type="text" class="form-control" value="<?= $pelanggan->kode_pos; ?>" disabled>
                <?php echo form_error('kode_pos', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="fungsi_bangunan">Fungsi Bangunan</label>
                <select id="fungsi_bangunan" name="fungsi_bangunan" class="form-control" disabled>
                    <option value="">Pilih Fungsi Bangunan</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Tempat Tinggal Keluarga atau Rumah Tangga') ? 'selected' : ''; ?>>Tempat Tinggal Keluarga atau Rumah Tangga</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Fasilitas Kesehatan') ? 'selected' : ''; ?>>Fasilitas Kesehatan</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Tempat Pemondokan atau Asrama') ? 'selected' : ''; ?>>Tempat Pemondokan atau Asrama</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Kantor Instansi Pemerintah') ? 'selected' : ''; ?>>Kantor Instansi Pemerintah</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Lembaga Pendidikan') ? 'selected' : ''; ?>>Lembaga Pendidikan</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Tempat Tinggal dan Usaha') ? 'selected' : ''; ?>>Tempat Tinggal dan Usaha</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Tempat Usaha atau Niaga') ? 'selected' : ''; ?>>Tempat Usaha atau Niaga</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Tempat Industri atau Pabrikan') ? 'selected' : ''; ?>>Tempat Industri atau Pabrikan</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Badan atau Lembaga Sosial') ? 'selected' : ''; ?>>Badan atau Lembaga Sosial</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Tempat Ibadah') ? 'selected' : ''; ?>>Tempat Ibadah</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Kran Umum') ? 'selected' : ''; ?>>Kran Umum</option>
                    <option <?= ($pelanggan->fungsi_bangunan == 'Lain-lain') ? 'selected' : ''; ?>>Lain-lain</option>
                </select>
                <?php echo form_error('fungsi_bangunan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="detail_alamat">Detail Alamat</label>
                <textarea class="form-control" placeholder="Isikan Detail Alamat Anda" name="detail_alamat" id="detail_alamat" rows="4" disabled><?= $pelanggan->detail_alamat; ?></textarea>
                <?php echo form_error('detail_alamat', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="jp_tetap">Jumlah Penghuni Tetap</label>
                        <div class="input-group">
                            <input name="jp_tetap" placeholder="Isikan Jumlah Penghuni Tetap" id="jp_tetap" type="text" class="form-control" value="<?= $pelanggan->jp_tetap; ?>" disabled><span class="input-group-text">orang</span>
                            <?php echo form_error('jp_tetap', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="jp_tdk_tetap">Jumlah Penghuni Tidak Tetap</label>
                        <div class="input-group">
                            <input name="jp_tdk_tetap" placeholder="Isikan Jumlah Penghuni Tidak Tetap" id="jp_tdk_tetap" type="text" class="form-control" value="<?= $pelanggan->jp_tdk_tetap; ?>" disabled>
                            <span class="input-group-text">orang</span>
                            <?php echo form_error('jp_tdk_tetap', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="lebar_jalan">Lebar Jalan</label>
                <div class="input-group">
                    <input name="lebar_jalan" placeholder="Isikan Lebar Jalan" id="lebar_jalan" type="text" class="form-control" value="<?= $pelanggan->lebar_jalan; ?>" disabled>
                    <span class="input-group-text">meter</span>
                </div>
                <?php echo form_error('lebar_jalan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="luas_tanah">Luas Tanah</label>
                <div class="input-group">
                    <input name="luas_tanah" placeholder="Isikan Luas Tanah" id="luas_tanah" type="text" class="form-control" value="<?= $pelanggan->luas_tanah; ?>" disabled>
                    <span class="input-group-text">m<sup>2</sup></span>
                </div>
                <?php echo form_error('luas_tanah', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="luas_bangunan">Luas Bangunan</label>
                <div class="input-group">
                    <input name="luas_bangunan" placeholder="Isikan Luas Bangunan" id="luas_bangunan" type="text" class="form-control" value="<?= $pelanggan->luas_bangunan; ?>" disabled>
                    <span class="input-group-text">m<sup>2</sup></span>
                </div>
                <?php echo form_error('luas_bangunan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
            <div class="form-group mb-3">
                <label for="tegangan_listrik">Tegangan Listrik</label>
                <div class="input-group">
                    <input name="tegangan_listrik" placeholder="Isikan Tegangan Listrik" id="tegangan_listrik" type="text" value="<?= $pelanggan->tegangan_listrik; ?>" disabled class="form-control">
                    <span class="input-group-text">kWh</span>
                </div>
                <?php echo form_error('tegangan_listrik', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
            </div>
        </container>
    </div>
</div>