<div class="card-body">
    <table class="table table-bordered text-sm" id="example1">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Fungsi Bangunan</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>File KTP</th>
                <th>File KK</th>
                <th>File Pajak Bumi Bangunan</th>
                <th>Foto Rumah</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($n_pelanggan as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->alamat ?></td>
                    <td><?= $value->fungsi_bangunan ?></td>
                    <td><?= $value->tgl_daftar ?></td>
                    <td class="text-center">
                        <a href="<?= 'https://www.google.com/maps/dir/?api=1&destination=' . $value->latitude . ',' . $value->longitude . '&travelmode=driving' ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-route"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="<?= base_url('pelanggan/download/') . $value->id ?>?jns=ktp" class="btn btn-sm btn-primary"><i class="fas fa-download"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="<?= base_url('pelanggan/download/') . $value->id ?>?jns=kk" class="btn btn-sm btn-primary"><i class="fas fa-download"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="<?= base_url('pelanggan/download/') . $value->id ?>?jns=pbb" class="btn btn-sm btn-primary"><i class="fas fa-download"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="<?= base_url('pelanggan/download/') . $value->id ?>?jns=rmh" class="btn btn-sm btn-primary"><i class="fas fa-download"></i></a>
                    </td>
                    <td class="text-center mx-auto">
                        <?php if ($value->status == 'Diproses') : ?>
                            <span class="badge badge-warning py-2 px-3 text-dark"><?= $value->status ?></span>
                        <?php else : ?>
                            <span class="badge badge-success py-2 px-3 text-white"><?= $value->status ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if ($value->status == 'Diproses') : ?>
                            <a href="<?= base_url('pelanggan/status/' . $value->id) ?>" class="btn btn-sm btn-success btnChangeStatus"><i class="fas fa-check"></i></a>
                        <?php endif; ?>
                        <a target="_blank" href="<?= base_url('pelanggan/detail_pelanggan/') . $value->id ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>