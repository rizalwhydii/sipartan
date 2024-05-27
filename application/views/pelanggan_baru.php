<div class="card-body">
    <div class="row">
        <div class="col">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nomor SR</label>
                    <input name="nosr" placeholder="Nomor SR" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" placeholder="Nama" type="text" class="form-control" value="<?= $pelanggan['nama']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat_sr" id="alamat_sr" placeholder="Alamat" class="form-control" value="<?= $pelanggan['alamat']; ?>" disabled>
                </div>
                <div>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>