<div class="card-body">
    <div class="row">
        <div class="container mt-3">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Admin</label>
                    <input name="nama_admin" placeholder="Isikan Nama Admin" type="text" class="form-control" value="<?php echo set_value('nama_admin'); ?>">
                </div>
                <div class="form-group">
                    <label>Judul Berita</label>
                    <input name="judul_berita" placeholder="Isikan Judul Berita" type="text" class="form-control" value="<?php echo set_value('judul_berita'); ?>">
                </div>
                <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea class="form-control" placeholder="Isikan Informasi Berita" name="isi_berita" rows="4"><?php echo set_value('isi_berita'); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar_berita" class="form-control" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <button type="reset" class="btn btn-success">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>