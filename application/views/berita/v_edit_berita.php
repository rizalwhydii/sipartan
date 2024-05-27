<div class="card-body">
    <div class="row">
        <div class="container mt-3">
            <?php
            echo validation_errors(
                '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>',
                '</div>'
            );
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
            }
            echo form_open_multipart('berita/edit/' . $berita->id_berita);
            ?>
            <div class="form-group">
                <label>Nama Admin</label>
                <input name="nama_admin" value="<?= $berita->nama_admin ?>" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Judul Berita</label>
                <input id="Judul Berita" value="<?= $berita->judul_berita ?>" name="judul_berita" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Isi Berita</label>
                <textarea class="form-control" placeholder="Isikan Informasi Berita" name="isi_berita" rows="4"><?= $berita->isi_berita; ?></textarea>
            </div>
            <div class="form-group">
                <label>Gambar Berita</label>
                <img src="<?= base_url('assets/gambar_berita/' . $berita->gambar_berita) ?>" width="120px">
            </div>
            <div class="form-group">
                <label>Ganti Gambar</label>
                <input type="file" name="gambar_berita" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-info">Simpan</button>
                <button type="reset" class="btn btn-success">Reset</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>
</div>
</div>