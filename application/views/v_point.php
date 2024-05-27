<a href="<?= base_url('point/add') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Add Data</a>
<div class="card-body">
    <table class="table table-bordered text-sm" id="example1">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama Objek</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($point as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nama_objek ?></td>
                    <td><?= $value->longitude ?></td>
                    <td><?= $value->latitude ?></td>
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
                            <a href="<?= base_url('point/status/' . $value->id) ?>" class="btn btn-sm btn-success btnChangeStatus"><i class="fas fa-check"></i></a>
                        <?php endif; ?>
                        <a href="<?= 'https://www.google.com/maps/dir/?api=1&destination=' . $value->latitude . ',' . $value->longitude . '&travelmode=driving' ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-route"></i></a>
                        <a href="<?= base_url('point/edit/' . $value->id) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('point/delete/' . $value->id) ?>" class="btnDelete btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>