<div class="card-body">
    <div class="content">
        <div data-aos="fade-up" id="map" style="width: 100%; height: 90vh; color:black;"></div>
    </div>
    <script>
        //  Data Perencanaan
        var pointP = new L.LayerGroup();
        var polylineP = new L.LayerGroup();
        var polygonP = new L.LayerGroup();

        // Data Existing
        var pointE = new L.LayerGroup();
        var polylineE = new L.LayerGroup();
        var polygonE = new L.LayerGroup();

        var point_data = L.markerClusterGroup();
        var polyline_data = new L.LayerGroup();
        var polygon_data = new L.LayerGroup();
        var pipa = new L.LayerGroup();
        var sd = new L.LayerGroup();
        var reservoar = new L.LayerGroup();
        var genset = new L.LayerGroup();
        var administrasi = new L.LayerGroup();

        // Data Pelanggan
        var data_pelanggan = new L.LayerGroup();

        var map = L.map('map', {
            center: [-7.0041432315589525, 110.1765823743199],
            zoom: 11,
            zoomControl: false,
            layers: []
        });

        var g_roadmap = new L.Google('ROADMAP');
        var g_satellite = new L.Google('SATELLITE');
        var g_terrain = new L.Google('TERRAIN');

        var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
            maxZoom: 22,
            attribution: 'WebGIS Trainning by Rizal Wahyudi'
        }).addTo(map);

        L.control.coordinates({
            position: "topright",
            decimals: 6,
            decimalSeperator: ",",
            labelTemplateLat: "Latitude: {y}",
            labelTemplateLng: "Longitude: {x}"
        }).addTo(map);

        var baseLayers = {
            'Google Satellite Hybrid': GoogleSatelliteHybrid,
            'Google Roadmap': g_roadmap,
            'Google Satellite': g_satellite,
            'Google Terrain': g_terrain

        };
        var groupedOverlays = {
            "Peta Perencanaan": {
                "Titik Aksesoris ": pointP,
                "Jaringan Pipa": polylineP,
                "Area": polygonP
            },
            "Peta Eksisting": {
                "Realisasi Titik Aksesoris": pointE,
                "Realisasi Jaringan Pipa": polylineE,
                "Realisasi Area": polygonE,
                "Jaringan Pipa": pipa,
                "Titik Sumur Dalam": sd,
                "Titik Reservoar": reservoar,
                "Titik Genset": genset,
                "Batas Administrasi": administrasi
            },

        }

        // Map Feature
        L.control.groupedLayers(baseLayers, groupedOverlays, {
            collapsed: false
        }).addTo(map);

        L.Control.geocoder({
            position: "topleft",
            collapsed: false
        }).addTo(map);

        var zoom_bar = new L.Control.ZoomBar({
            position: 'topleft'
        }).addTo(map);

        L.control.scale().addTo(map);

        var measureControl = new L.Control.Measure({
            position: 'topleft',
            primaryLengthUnit: 'meters',
            secondaryLengthUnit: 'kilometers',
            primaryAreaUnit: 'sqmeters',
            secondaryAreaUnit: 'hectares'
        }).addTo(map);

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
        // End Map Feature

        // Catch Peta Dasar

        <?php foreach ($dataSD as $key => $value) { ?>
            var pointIcon = L.icon({
                iconUrl: '<?= base_url() ?>assets/iconSD.png',
                iconSize: [20, 25]
            });
            var dataSD = L.geoJson(<?= $value['shape']; ?>, {
                pointToLayer: function(feature, latlng) {
                    var marker = L.marker(latlng, {
                        icon: pointIcon
                    });
                    return marker;
                }
            }).addTo(sd).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value['name'] ?>" + "</td></tr>" + "<table>");
        <?php } ?>

        <?php foreach ($dataR as $key => $value) { ?>
            var pointIcon = L.icon({
                iconUrl: '<?= base_url() ?>assets/iconR.png',
                iconSize: [20, 25]
            });
            var dataR = L.geoJson(<?= $value['shape']; ?>, {
                pointToLayer: function(feature, latlng) {
                    var marker = L.marker(latlng, {
                        icon: pointIcon
                    });
                    return marker;
                }
            }).addTo(reservoar).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value['name'] ?>" + "</td></tr>" + "<table>");
        <?php } ?>

        <?php foreach ($dataG as $key => $value) { ?>
            var pointIcon = L.icon({
                iconUrl: '<?= base_url() ?>assets/iconG.png',
                iconSize: [20, 25]
            });
            var dataR = L.geoJson(<?= $value['shape']; ?>, {
                pointToLayer: function(feature, latlng) {
                    var marker = L.marker(latlng, {
                        icon: pointIcon
                    });
                    return marker;
                }
            }).addTo(genset).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value['name'] ?>" + "</td></tr>" + "<table>");
        <?php } ?>

        <?php foreach ($dataP as $key => $value) { ?>
            pipa = L.geoJSON(<?= $value['shape']; ?>, {
                style: {
                    weight: 2,
                    color: '<?= $value['color'] ?>',
                    fillOpacity: 1.0,
                },
            }).addTo(pipa);
            pipa.eachLayer(function(layer) {
                layer.bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                    "<tr><th>Jenis Pipa</th><td>" + "<?= $value['jenis_pipa'] ?>" + "</td></tr>" +
                    "<tr><th>Diameter</th><td>" + "<?= $value['diameter'] ?>" + "</td></tr>" +
                    "<tr><th>Lokasi</th><td>" + "<?= $value['lokasi'] ?>" + "</td></tr>" + "</td></tr>" +
                    "<table>");
            });
        <?php } ?>

        <?php foreach ($dataA as $key => $value) { ?>
            administrasi = L.geoJSON(<?= $value['shape']; ?>, {
                style: {
                    weight: 2,
                    fillColor: '<?= $value['color'] ?>',
                    fillOpacity: 0.5,
                },
            }).addTo(administrasi);
            administrasi.eachLayer(function(layer) {
                layer.bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                    "<tr><th>Kecamatan</th><td>" + "<?= $value['wadmkc'] ?>" + "</td></tr>" + "</td></tr>" +
                    "<table>");
            });
        <?php } ?>

        <?php foreach ($titikKec as $key => $value) : ?>
            var kecamatan = L.geoJson(<?= $value['shape']; ?>, {
                pointToLayer: function(feature, latlng) {
                    return L.marker(latlng, {
                        icon: L.divIcon({
                            className: 'leaflet-mouse-marker',
                        }),
                        interactive: false
                    })
                }
            }).addTo(administrasi).bindTooltip('<?= $value['wadmkc']; ?>', {
                direction: "center",
                permanent: true,
                className: 'styleLabelKecamatan'
            });

            resetLabels([kecamatan]);
            map.on("zoomend", function() {
                if (map.getZoom() <= 12) {
                    resetLabels([kecamatan]);
                } else if (map.getZoom() > 12) {
                    resetLabels([kecamatan]);
                }
            });
            map.on("move", function() {
                resetLabels([kecamatan]);
            });
            map.on("layeradd", function() {
                resetLabels([kecamatan]);
            });
            map.on("layerremove", function() {
                resetLabels([kecamatan]);
            });
        <?php endforeach; ?>
        // End Catch Peta Dasar

        // Catch Data Perencanaan
        <?php foreach ($pointP as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/marker/' . $value->marker) ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(pointP).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama_objek ?>" + "</td></tr>" +
                "<tr><th>Longitude</th><td>" + "<?= $value->longitude ?>" + "</td></tr>" +
                "<tr><th>Latitude</th><td>" + "<?= $value->latitude ?>" + "</td></tr>" +
                "<tr><th>Foto</th><td>" + "<img src='<?= base_url('assets/gambar/' . $value->gambar) ?>'width='180px'>" + "</td></tr>" + "<table>");
        <?php } ?>
        <?php foreach ($polylineP as $key => $value) { ?>
            polyline = L.geoJSON(<?= $value->geojson; ?>, {
                style: {
                    color: "<?= $value->color ?>"
                },
            }).addTo(polylineP);
            polyline.eachLayer(function(layer) {
                layer.bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                    "<tr><th>Nama Objek</th><td>" + "<?= $value->nama_objek ?>" + "</td></tr>" +
                    "<tr><th>Color</th><td>" + "<?= $value->color ?>" + "</td></tr>" +
                    "<tr><th>Gambar</th><td>" + "<img src='<?= base_url('assets/gambar/' . $value->gambar) ?>'width='180px'>" + "</td></tr>" +
                    "<table>");
            });
        <?php } ?>
        <?php foreach ($polygonP as $key => $value) { ?>
            polygon = L.geoJSON(<?= $value->geojson; ?>, {
                style: {
                    color: 'white',
                    dashArray: '3',
                    lineCap: 'butt',
                    lineJoin: 'miter',
                    fillColor: '<?= $value->color ?>',
                    fillOpacity: 1.0,
                },
            }).addTo(polygonP);
            polygon.eachLayer(function(layer) {
                layer.bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                    "<tr><th>Nama Objek</th><td>" + "<?= $value->nama_objek ?>" + "</td></tr>" +
                    "<tr><th>Color</th><td>" + "<?= $value->color ?>" + "</td></tr>" +
                    "<tr><th>Gambar</th><td>" + "<img src='<?= base_url('assets/gambar/' . $value->gambar) ?>'width='180px'>" + "</td></tr>" +
                    "<table>");
            });
        <?php } ?>
        // End Catch Data Digitasi

        // Catch Data Existing
        <?php foreach ($pointE as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/marker/' . $value->marker) ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(pointE).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama_objek ?>" + "</td></tr>" +
                "<tr><th>Longitude</th><td>" + "<?= $value->longitude ?>" + "</td></tr>" +
                "<tr><th>Latitude</th><td>" + "<?= $value->latitude ?>" + "</td></tr>" +
                "<tr><th>Foto</th><td>" + "<img src='<?= base_url('assets/gambar/' . $value->gambar) ?>'width='180px'>" + "</td></tr>" + "<table>");
        <?php } ?>
        <?php foreach ($polylineE as $key => $value) { ?>
            polyline = L.geoJSON(<?= $value->geojson; ?>, {
                style: {
                    color: "<?= $value->color ?>"
                },
            }).addTo(polylineE);
            polyline.eachLayer(function(layer) {
                layer.bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                    "<tr><th>Nama Objek</th><td>" + "<?= $value->nama_objek ?>" + "</td></tr>" +
                    "<tr><th>Color</th><td>" + "<?= $value->color ?>" + "</td></tr>" +
                    "<tr><th>Gambar</th><td>" + "<img src='<?= base_url('assets/gambar/' . $value->gambar) ?>'width='180px'>" + "</td></tr>" +
                    "<table>");
            });
        <?php } ?>
        <?php foreach ($polygonE as $key => $value) { ?>
            polygon = L.geoJSON(<?= $value->geojson; ?>, {
                style: {
                    color: 'white',
                    dashArray: '3',
                    lineCap: 'butt',
                    lineJoin: 'miter',
                    fillColor: '<?= $value->color ?>',
                    fillOpacity: 1.0,
                },
            }).addTo(polygonE);
            polygon.eachLayer(function(layer) {
                layer.bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                    "<tr><th>Nama Objek</th><td>" + "<?= $value->nama_objek ?>" + "</td></tr>" +
                    "<tr><th>Color</th><td>" + "<?= $value->color ?>" + "</td></tr>" +
                    "<tr><th>Gambar</th><td>" + "<img src='<?= base_url('assets/gambar/' . $value->gambar) ?>'width='180px'>" + "</td></tr>" +
                    "<table>");
            });
        <?php } ?>
        // End Catch Data Digitasi
    </script>
</div>