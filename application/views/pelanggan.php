<div class="card-body">
    <table class="table table-bordered text-sm" id="example1">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nomor SR</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($pelanggan as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nosr ?></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->alamat_sr ?></td>
                    <td class="text-center"><?= ($value->telepon == null) ? '-' : $value->telepon ?></td>
                    <td><?= $value->status ?></td>
                    <td><?= $value->tglpemasan ?></td>
                    <td><?= $value->latitude ?></td>
                    <td><?= $value->longitude ?></td>
                    <td><a href="<?= 'https://www.google.com/maps/dir/?api=1&destination=' . $value->latitude . ',' . $value->longitude . '&travelmode=driving' ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-route"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>