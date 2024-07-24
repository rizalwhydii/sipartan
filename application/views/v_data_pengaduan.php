<div class="card-body">
    <table class="table table-bordered text-sm" id="example1">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>No. PAM</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Bukti Pengaduan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($pengaduan as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nomor_pam ?></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->telepon ?></td>
                    <td><?= $value->email ?></td>
                    <td class="text-center"><?= $value->kategori_pengaduan ?></td>
                    <td class="text-center"><?= date('d-m-Y H:i:s', strtotime($value->tgl_pengaduan)) ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('pelanggan/download/') . $value->id_pengaduan ?>?jns=bp" class="btn btn-sm btn-primary"><i class="fas fa-download"></i></a>
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
                            <a href="<?= base_url('pelanggan/status_pengaduan/' . $value->id_pengaduan) ?>" class="btn btn-sm btn-success btnChangeStatus"><i class="fas fa-check"></i></a>
                        <?php endif; ?>
                        <a href="<?= 'https://www.google.com/maps/dir/?api=1&destination=' . $value->latitude . ',' . $value->longitude . '&travelmode=driving' ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-route"></i></a>
                        <a target="_blank" href="<?= base_url('pelanggan/detail_pengaduan/') . $value->id_pengaduan ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>