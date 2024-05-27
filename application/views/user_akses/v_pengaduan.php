<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="title"> <b> SIPARTAN</b></h2>
            <ol>
                <li><b>Home</b></li>
                <li><b><?= $judul ?></b></li>
            </ol>
        </div>
    </div>
</section><!-- Breadcrumbs Section -->

<div class="content">
    <div class="container mt-3">
        <div class="row">
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="nomor_pam">Nomor PAM <span class="text-danger">*</span></label>
                    <input name="nomor_pam" placeholder="Isikan Nomor PAM Anda" id="nomor_pam" type="text" class="form-control" value="<?php echo set_value('nomor_pam'); ?>">
                    <?php echo form_error('nomor_pam', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="nama">Nama <span class="text-danger">*</span></label>
                    <input name="nama" placeholder="Isikan Nama Lengkap Anda" id="nama" type="text" class="form-control" value="<?php echo set_value('nama'); ?>">
                    <?php echo form_error('nama', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="telepon">No.HP/WA <span class="text-danger">*</span></label>
                    <input name="telepon" placeholder="Isikan Nomor Telepon Anda" id="telepon" type="text" class="form-control" value="<?php echo set_value('telepon'); ?>">
                    <?php echo form_error('telepon', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email Aktif <span class="text-danger">*</span></label>
                    <input name="email" placeholder="Isikan Alamat Email Anda" id="email" type="email" class="form-control" value="<?php echo set_value('email'); ?>">
                    <?php echo form_error('email', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <input name="alamat" placeholder="Isikan Alamat Lengkap Anda" id="alamat" type="text" class="form-control" value="<?php echo set_value('alamat'); ?>">
                    <?php echo form_error('alamat', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div id="map" style="width: 100%; height: 600px;"></div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group my-3">
                            <label for="latitude">Latitude</label>
                            <input id="Latitude" name="latitude" placeholder="Latitude" id="latitude" type="text" class="form-control" value="<?php echo set_value('latitude'); ?>" readonly>
                            <?php echo form_error('latitude', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group my-3">
                            <label for="longitude">Longitude</label>
                            <input name="longitude" id="Longitude" placeholder="Longitude" id="longitude" class="form-control" value="<?php echo set_value('longitude'); ?>" readonly>
                            <?php echo form_error('longitude', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="kategori_pengaduan">Kategori Pengaduan</label>
                    <select id="kategori_pengaduan" name="kategori_pengaduan" class="form-control">
                        <option value="">Pilih Kategori Pengaduan</option>
                        <option>Pipa Bocor</option>
                        <option>Meter Air</option>
                        <option>Instalasi Sambungan Rumah</option>
                        <option>Kualitas Air</option>
                        <option>Pelanggaran</option>
                        <option>Pengaliran Air</option>
                        <option>Layanan</option>
                    </select>
                    <?php echo form_error('kategori_pengaduan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="isi_pengaduan">Isi Pengaduan</label>
                    <textarea class="form-control" placeholder="Isikan Detail Pengaduan Anda" name="isi_pengaduan" id="isi_pengaduan" rows="4"><?php echo set_value('isi_pengaduan'); ?></textarea>
                    <?php echo form_error('isi_pengaduan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div>
                    <button type="submit" class="btn btn-success px-4 my-4" style="background: #D83D89;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        maxZoom: 22,
        attribution: 'WebGIS Trainning by Rizal Wahyudi'
    });
    var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    var map = L.map('map', {
        center: [-6.921760221991154, 110.20412157920578],
        zoom: 15,
        zoomControl: false,
        layers: [GoogleSatelliteHybrid]
    });
    var baseLayers = {
        "Google Satellite Hybrid": GoogleSatelliteHybrid,
        "Open Street Map Mapnik": OpenStreetMap_Mapnik
    };
    var overlays = {};
    L.control.layers(baseLayers).addTo(map);
    // L.Control.geocoder({position :"topleft", collapsed:false}).addTo(map);
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [-6.921760221991154, 110.20412157920578];
    }
    map.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });
    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng).keyup();
    });
    $("#Latitude, #Longitude").change(function() {
        var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        map.panTo(position);
    });
    map.addLayer(marker);
</script>