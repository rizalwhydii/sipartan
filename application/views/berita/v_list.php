<a href="<?= base_url('berita/add') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Add Data</a>
<div class="card-body">
    <table class="table table-bordered text-sm" id="example1">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Judul Berita</th>
                <th>Tanggal</th>
                <th>Gambar</th>
                <th>Nama Admin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($berita as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->judul_berita ?></td>
                    <td><?= $value->tgl_berita ?></td>
                    <td><?= $value->gambar_berita ?></td>
                    <td><?= $value->nama_admin ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('berita/edit/' . $value->id_berita) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('berita/delete/' . $value->id_berita) ?>" class="btnDelete btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>