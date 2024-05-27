<a href="<?= base_url('polygon/add') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Add Data</a>
<div class="card-body">
    <table class="table table-bordered text-sm" id="example1">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama Objek</th>
                <th>Color</th>
                <th>Geojson</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($polygon as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nama_objek ?></td>
                    <td><?= $value->color ?></td>
                    <td style="max-width: 300px"><?= $value->geojson ?></td>
                    <td class="text-center"><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" Width="100px"></td>
                    <td class="text-center mx-auto">
                        <?php if ($value->status == 'Diproses') : ?>
                            <span class="badge badge-warning py-2 px-3 text-dark"><?= $value->status ?></span>
                        <?php else : ?>
                            <span class="badge badge-success py-2 px-3 text-white"><?= $value->status ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if ($value->status == 'Diproses') : ?>
                            <a href="<?= base_url('polygon/status/' . $value->id) ?>" class="btn btn-sm btn-success btnChangeStatus"><i class="fas fa-check"></i></a>
                        <?php endif; ?>
                        <a href="<?= base_url('polygon/edit/' . $value->id) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('polygon/delete/' . $value->id) ?>" class="btnDelete btn btn-sm btn-danger" on-click="return confirm('Apakah Anda Yakin Ingin Hapus Data ini..?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>