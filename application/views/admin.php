<div class="content">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Data Existing
        </h3>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #49548E;">
                    <div class="inner">
                        <h3><?= $jumlah_sd; ?></h3>

                        <p>Jumlah Sumur Dalam</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('peta/maps'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #49548E;">
                    <div class="inner">
                        <h3><?= $jumlah_genset; ?></h3>

                        <p>Jumlah Genset</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('peta/maps'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #49548E;">
                    <div class="inner">
                        <h3><?= $jumlah_reservoar; ?></h3>

                        <p>Jumlah Reservoar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('peta/maps'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #49548E;">
                    <div class="inner">
                        <h3><?= $jumlah_pipa; ?></h3>

                        <p>Jumlah Pipa</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('peta/maps'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #49548E;">
                    <div class="inner">
                        <h3><?= $jumlah_pelanggan; ?></h3>

                        <p>Jumlah Pelanggan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('peta/maps'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Data Perencanaan
        </h3>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #49548E;">
                    <div class="inner">
                        <h3><?= $jumlah_point; ?></h3>

                        <p>Jumlah Perencanaan Titik Aksesoris</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('point'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #49548E;">
                    <div class="inner">
                        <h3><?= $jumlah_polyline; ?></h3>

                        <p>Jumlah Perencanaan Pipa</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('polyline'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #49548E;">
                    <div class="inner">
                        <h3><?= $jumlah_polygon; ?></h3>

                        <p>Jumlah Perencanaan Area</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('polygon'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Data Pengaduan
        </h3>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #49548E;">
                    <div class="inner">
                        <h3><?= $jumlah_pengaduan; ?></h3>

                        <p>Jumlah Pengaduan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url('pelanggan/pengaduan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>