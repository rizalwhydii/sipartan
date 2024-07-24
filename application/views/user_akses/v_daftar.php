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
            <form action="<?= base_url('user/daftar'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input name="nama" placeholder="Isikan Nama Lengkap Anda" id="nama" type="text" class="form-control" value="<?php echo set_value('nama'); ?>">
                    <?php echo form_error('nama', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="telepon">Telepon</label>
                    <input name="telepon" placeholder="Isikan Nomor Telepon Anda" id="telepon" type="text" class="form-control" value="<?php echo set_value('telepon'); ?>">
                    <?php echo form_error('telepon', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <input name="alamat" placeholder="Isikan Alamat Lengkap Anda" id="alamat" type="text" class="form-control" value="<?php echo set_value('alamat'); ?>">
                    <?php echo form_error('alamat', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="rt">RT</label>
                            <input name="rt" placeholder="Isikan Alamat RT Anda" id="rt" type="text" class="form-control" value="<?php echo set_value('rt'); ?>">
                            <?php echo form_error('rt', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="rw">RW</label>
                            <input name="rw" placeholder="Isikan Alamat RW Anda" id="rw" type="text" class="form-control" value="<?php echo set_value('rw'); ?>">
                            <?php echo form_error('rw', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="kecamatan">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" class="form-control">
                        <option value="">Pilih Kecamatan</option>
                        <option>Kecamatan Brangsong</option>
                        <option>Kecamatan Boja</option>
                        <option>Kecamatan Cepiring</option>
                        <option>Kecamatan Gemuh</option>
                        <option>Kecamatan Kaliwungu</option>
                        <option>Kecamatan Kaliwungu Selatan</option>
                        <option>Kecamatan Kangkung</option>
                        <option>Kecamatan Kendal</option>
                        <option>Kecamatan Limbangan</option>
                        <option>Kecamatan Ngampel</option>
                        <option>Kecamatan Plantungan</option>
                        <option>Kecamatan Pageruyung</option>
                        <option>Kecamatan Patean</option>
                        <option>Kecamatan Patebon</option>
                        <option>Kecamatan Pegandon</option>
                        <option>Kecamatan Ringinarum</option>
                        <option>Kecamatan Rowosari</option>
                        <option>Kecamatan Singorojo</option>
                        <option>Kecamatan Sukorejo</option>
                        <option>Kecamatan Weleri</option>
                    </select>
                    <?php echo form_error('kecamatan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="kelurahan">Kelurahan</label>
                    <input name="kelurahan" placeholder="Isikan Alamat Kelurahan Anda" id="kelurahan" type="text" class="form-control" value="<?php echo set_value('kelurahan'); ?>">
                    <?php echo form_error('kelurahan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="kode_pos">Kode Pos</label>
                    <input name="kode_pos" placeholder="Isikan Nomor Kode Pos Anda" id="kode_pos" type="text" class="form-control" value="<?php echo set_value('kode_pos'); ?>">
                    <?php echo form_error('kode_pos', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="fungsi_bangunan">Fungsi Bangunan</label>
                    <select id="fungsi_bangunan" name="fungsi_bangunan" class="form-control">
                        <option value="">Pilih Fungsi Bangunan</option>
                        <option>Tempat Tinggal Keluarga atau Rumah Tangga</option>
                        <option>Fasilitas Kesehatan</option>
                        <option>Tempat Pemondokan atau Asrama</option>
                        <option>Kantor Instansi Pemerintah</option>
                        <option>Lembaga Pendidikan</option>
                        <option>Tempat Tinggal dan Usaha</option>
                        <option>Tempat Usaha atau Niaga</option>
                        <option>Tempat Industri atau Pabrikan</option>
                        <option>Badan atau Lembaga Sosial</option>
                        <option>Tempat Ibadah</option>
                        <option>Kran Umum</option>
                        <option>Lain-lain</option>
                    </select>
                    <?php echo form_error('fungsi_bangunan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
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
                    <label for="detail_alamat">Detail Alamat</label>
                    <textarea class="form-control" placeholder="Isikan Detail Alamat Anda" name="detail_alamat" id="detail_alamat" rows="4"><?php echo set_value('detail_alamat'); ?></textarea>
                    <?php echo form_error('detail_alamat', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="jp_tetap">Jumlah Penghuni Tetap</label>
                            <div class="input-group">
                                <input name="jp_tetap" placeholder="Isikan Jumlah Penghuni Tetap" id="jp_tetap" type="text" class="form-control" value="<?php echo set_value('jp_tetap'); ?>"><span class="input-group-text">orang</span>
                                <?php echo form_error('jp_tetap', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">

                        <div class="form-group mb-3">
                            <label for="jp_tdk_tetap">Jumlah Penghuni Tidak Tetap</label>
                            <div class="input-group">
                                <input name="jp_tdk_tetap" placeholder="Isikan Jumlah Penghuni Tidak Tetap" id="jp_tdk_tetap" type="text" class="form-control" value="<?php echo set_value('jp_tdk_tetap'); ?>">
                                <span class="input-group-text">orang</span>
                                <?php echo form_error('jp_tdk_tetap', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="lebar_jalan">Lebar Jalan</label>
                    <div class="input-group">
                        <input name="lebar_jalan" placeholder="Isikan Lebar Jalan" id="lebar_jalan" type="text" class="form-control" value="<?php echo set_value('lebar_jalan'); ?>">
                        <span class="input-group-text">meter</span>
                    </div>
                    <?php echo form_error('lebar_jalan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="luas_tanah">Luas Tanah</label>
                    <div class="input-group">
                        <input name="luas_tanah" placeholder="Isikan Luas Tanah" id="luas_tanah" type="text" class="form-control" value="<?php echo set_value('luas_tanah'); ?>">
                        <span class="input-group-text">m<sup>2</sup></span>
                    </div>
                    <?php echo form_error('luas_tanah', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="luas_bangunan">Luas Bangunan</label>
                    <div class="input-group">
                        <input name="luas_bangunan" placeholder="Isikan Luas Bangunan" id="luas_bangunan" type="text" class="form-control" value="<?php echo set_value('luas_bangunan'); ?>">
                        <span class="input-group-text">m<sup>2</sup></span>
                    </div>
                    <?php echo form_error('luas_bangunan', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="tegangan_listrik">Tegangan Listrik</label>
                    <div class="input-group">
                        <input name="tegangan_listrik" placeholder="Isikan Tegangan Listrik" id="tegangan_listrik" type="text" value="<?php echo set_value('tegangan_listrik'); ?>" class="form-control">
                        <span class="input-group-text">kWh</span>
                    </div>
                    <?php echo form_error('tegangan_listrik', '<p class="text-danger mb-0" style="font-size: small;">', '</p>'); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="file_ktp">File Kartu Tanda Penduduk</label>
                    <div class="text-primary" style="font-size: small;">
                        * Format File .jpg atau .jpeg maks 10MB
                    </div>
                    <input id="file_ktp" type="file" name="files[]" class="form-control" multiple="" required>
                    <?php echo ($this->session->flashdata('error_ktp')) ? '<p class="text-danger mb-0" style="font-size: small;">File yang diupload tidak sesuai!</p>' : ''; ?>
                </div>
                <div class="form-group mb-3">
                    <label for="file_kk">File Kartu Keluarga</label>
                    <div class="text-primary" style="font-size: small;">
                        * Format File .jpg atau .jpeg maks 10MB
                    </div>
                    <input id="file_kk" type="file" name="files[]" class="form-control" multiple="" required>
                    <?php echo ($this->session->flashdata('error_kk')) ? '<p class="text-danger mb-0" style="font-size: small;">File yang diupload tidak sesuai!</p>' : ''; ?>
                </div>
                <div class="form-group mb-3">
                    <label for="file_pbb">File Pajak Bumi Bangunan</label>
                    <div class="text-primary" style="font-size: small;">
                        * Format File .jpg atau .jpeg maks 10MB
                    </div>
                    <input id="file_pbb" type="file" name="files[]" class="form-control" multiple="" required>
                    <?php echo ($this->session->flashdata('error_pbb')) ? '<p class="text-danger mb-0" style="font-size: small;">File yang diupload tidak sesuai!</p>' : ''; ?>
                </div>
                <div class="form-group mb-3">
                    <label for="foto_rumah">File Foto Rumah</label>
                    <div class="text-primary" style="font-size: small;">
                        * Format File .jpg atau .jpeg maks 10MB
                    </div>
                    <input id="foto_rumah" type="file" name="files[]" class="form-control" multiple="" required>
                    <?php echo ($this->session->flashdata('error_foto')) ? '<p class="text-danger mb-0" style="font-size: small;">File yang diupload tidak sesuai!</p>' : ''; ?>
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
    var locateControl = L.control.locate({
        position: "topleft",
        drawCircle: true,
        follow: true,
        setView: true,
        keepCurrentZoomLevel: true,
        markerStyle: {
            weight: 1,
            opacity: 0.8,
            fillOpacity: 0.8
        },
        circleStyle: {
            weight: 1,
            clickable: false
        },
        icon: "fas fa-location-arrow",
        metric: false,
        strings: {
            title: "My location",
            popup: "You are within {distance} {unit} from this point",
            outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
        },
        locateOptions: {
            maxZoom: 18,
            watch: true,
            enableHighAccuracy: true,
            maximumAge: 10000,
            timeout: 10000
        }
    }).addTo(map);
</script>