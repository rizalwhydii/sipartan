<div class="card-body">
    <div class="row">
        <div class="col-sm-7">
            <!-- peta -->
            <div id="map" style="width: 100%; height: 600px;"></div>
            <!-- end peta -->
        </div>
        <div class="col-sm-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Objek</label>
                    <input name="nama_objek" placeholder="Nama Objek" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Latitude</label>
                    <input id="Latitude" name="latitude" placeholder="Latitude" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Longitude</label>
                    <input name="longitude" id="Longitude" placeholder="Longitude" class="form-control">
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Marker</maker>
                        <select name="marker" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="markerR.png">Reservoar</option>
                            <option value="markerG.png">Genset</option>
                            <option value="markerSD.png">Sumur Dalam</option>
                            <option value="markerL.png">Lainnya</option>
                        </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <button type="reset" class="btn btn-success">Reset</button>
                </div>
            </form>
        </div>
    </div>
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