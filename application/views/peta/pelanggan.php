<div class="card-body">
    <div class="content">
        <div data-aos="fade-up" id="map" style="width: 100%; height: 135vh; color:black;"></div>
    </div>
    <script>
        var kec_brangsong = new L.markerClusterGroup();
        var kec_cepiring = new L.markerClusterGroup();
        var kec_kangkung = new L.markerClusterGroup();
        var kec_kendal = new L.markerClusterGroup();
        var kec_ngampel = new L.markerClusterGroup();
        var kec_patebon = new L.markerClusterGroup();
        var kec_pegandon = new L.markerClusterGroup();
        var kec_boja = new L.markerClusterGroup();
        var kec_gemuh = new L.markerClusterGroup();
        var kec_kaliwungu = new L.markerClusterGroup();
        var kec_kaliwungu_selatan = new L.markerClusterGroup();
        var kec_limbangan = new L.markerClusterGroup();
        var kec_plantungan = new L.markerClusterGroup();
        var kec_pageruyung = new L.markerClusterGroup();
        var kec_patean = new L.markerClusterGroup();
        var kec_ringinarum = new L.markerClusterGroup();
        var kec_rowosari = new L.markerClusterGroup();
        var kec_singorojo = new L.markerClusterGroup();
        var kec_sukorejo = new L.markerClusterGroup();
        var kec_weleri = new L.markerClusterGroup();
        var pipa = new L.LayerGroup();
        var sd = new L.LayerGroup();
        var reservoar = new L.LayerGroup();
        var genset = new L.LayerGroup();

        var map = L.map('map', {
            center: [-7.0041432315589525, 110.1765823743199],
            zoom: 11,
            zoomControl: false,
            layers: []
        });

        var OpenStreetMap_Mapnik = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
        });

        var Stadia_StamenTerrainBackground = L.tileLayer('https://tiles.stadiamaps.com/tiles/stamen_terrain_background/{z}/{x}/{y}{r}.{ext}', {
            minZoom: 0,
            maxZoom: 18,
            attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://www.stamen.com/" target="_blank">Stamen Design</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            ext: 'png'
        });

        var g_roadmap = new L.Google('ROADMAP');
        var g_satellite = new L.Google('SATELLITE');
        var g_terrain = new L.Google('TERRAIN');

        var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
            maxZoom: 22,
            attribution: 'WebGIS Trainning by Rizal Wahyudi'
        });

        L.control.coordinates({
            position: "topright",
            decimals: 6,
            decimalSeperator: ",",
            labelTemplateLat: "Latitude: {y}",
            labelTemplateLng: "Longitude: {x}"
        }).addTo(map);

        var baseLayers = {
            'OpenStreetMap Mapnik': OpenStreetMap_Mapnik,
            'Google Satellite Hybrid': GoogleSatelliteHybrid,
            'Esri World Imagery': Esri_WorldImagery,
            'Stadia Terrain': Stadia_StamenTerrainBackground

        };
        var groupedOverlays = {
            "Data": {
                "Kec. Brangsong": kec_brangsong,
                "Kec. Cepiring": kec_cepiring,
                "Kec. Kangkung": kec_kangkung,
                "Kec. Kendal": kec_kendal,
                "Kec. Ngampel": kec_ngampel,
                "Kec. Patebon": kec_patebon,
                "Kec. Pegandon": kec_pegandon,
                "Kec. Boja": kec_boja,
                "Kec. Gemuh": kec_gemuh,
                "Kec. Kaliwungu": kec_kaliwungu,
                "Kec. Kaliwungu Selatan": kec_kaliwungu_selatan,
                "Kec. Limbangan": kec_limbangan,
                "Kec. Plantungan": kec_plantungan,
                "Kec. Pageruyung": kec_pageruyung,
                "Kec. Patean": kec_patean,
                "Kec. Ringinarum": kec_ringinarum,
                "Kec. Rowosari": kec_rowosari,
                "Kec. Singorojo": kec_singorojo,
                "Kec. Sukorejo": kec_sukorejo,
                "Kec. Weleri": kec_weleri,
            },

            "Data Eksisting": {
                "Jaringan Pipa": pipa,
                "Titik Sumur Dalam": sd,
                "Titik Reservoar": reservoar,
                "Titik Genset": genset,
            }
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
        // End Map Featur
        <?php foreach ($kec_brangsong as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_brangsong).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_cepiring as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_cepiring).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_kangkung as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_kangkung).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_kendal as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_kendal).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_ngampel as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_ngampel).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_patebon as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_patebon).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_pegandon as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_pegandon).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_boja as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_boja).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_gemuh as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_gemuh).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_kaliwungu as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_kaliwungu).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_kaliwungu_selatan as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_kaliwungu_selatan).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_limbangan as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_limbangan).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_plantungan as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_plantungan).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_pageruyung as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_pageruyung).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_patean as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_patean).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_ringinarum as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_ringinarum).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_rowosari as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_rowosari).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_singorojo as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_singorojo).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_sukorejo as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_sukorejo).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($kec_weleri as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url('assets/city.png') ?>',
                    iconSize: [30, 36], // size of the icon 
                })
            }).addTo(kec_weleri).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value->nama ?>" + "</td></tr>" +
                "<tr><th>Nomor SR</th><td>" + "<?= $value->nosr ?>" + "</td></tr>" +
                "<tr><th>Alamat</th><td>" + "<?= $value->alamat_sr ?>" + "</td></tr>" +
                "<tr><th>Kontak</th><td>" + "<?= ($value->telepon == null) ? '-' : $value->telepon ?>" + "</td></tr>" +
                "<table>");
        <?php } ?>

        <?php foreach ($dataSD as $key => $value) { ?>
            var pointIcon = L.icon({
                iconUrl: '<?= base_url() ?>assets/S_SumurDalam.png',
                iconSize: [25, 30]
            });
            var dataSD = L.geoJson(<?= $value['shape']; ?>, {
                pointToLayer: function(feature, latlng) {
                    var marker = L.marker(latlng, {
                        icon: pointIcon
                    });
                    return marker;
                }
            }).addTo(sd).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value['name'] ?>" + "</td></tr>" +
                "<tr><th>Sumber</th><td>" + "<?= $value['sumber'] ?>" + "</td></tr>" + "<table>");
        <?php } ?>

        <?php foreach ($dataR as $key => $value) { ?>
            var pointIcon = L.icon({
                iconUrl: '<?= base_url() ?>assets/S_Reservoir.png',
                iconSize: [25, 30]
            });
            var dataR = L.geoJson(<?= $value['shape']; ?>, {
                pointToLayer: function(feature, latlng) {
                    var marker = L.marker(latlng, {
                        icon: pointIcon
                    });
                    return marker;
                }
            }).addTo(reservoar).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value['name'] ?>" + "</td></tr>" +
                "<tr><th>Sumber</th><td>" + "<?= $value['sumber'] ?>" + "</td></tr>" + "<table>");
        <?php } ?>

        <?php foreach ($dataG as $key => $value) { ?>
            var pointIcon = L.icon({
                iconUrl: '<?= base_url() ?>assets/S_Genset.png',
                iconSize: [25, 30]
            });
            var dataR = L.geoJson(<?= $value['shape']; ?>, {
                pointToLayer: function(feature, latlng) {
                    var marker = L.marker(latlng, {
                        icon: pointIcon
                    });
                    return marker;
                }
            }).addTo(genset).bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" + "<?= $value['name'] ?>" + "</td></tr>" +
                "<tr><th>Sumber</th><td>" + "<?= $value['sumber'] ?>" + "</td></tr>" + "<table>");
        <?php } ?>

        <?php foreach ($dataP as $key => $value) { ?>
            pipa = L.geoJSON(<?= $value['shape']; ?>, {
                style: {
                    weight: <?= weightPipa($value['diameter']); ?>,
                    color: '#004da8',
                    fillOpacity: 1.0,
                },
            }).addTo(pipa);
            pipa.eachLayer(function(layer) {
                layer.bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                    "<tr><th>Jenis Pipa</th><td>" + "<?= $value['jenis_pipa'] ?>" + "</td></tr>" +
                    "<tr><th>Diameter</th><td>" + "<?= $value['diameter'] ?>" + "</td></tr>" +
                    "<tr><th>Panjang (m)</th><td>" + "<?= round($value['panjang'], 2) ?>" + "</td></tr>" +
                    "<tr><th>Lokasi</th><td>" + "<?= ucwords(strtolower($value['lokasi'])) ?>" + "</td></tr>" +
                    "<tr><th>Sumber</th><td>" + "<?= $value['sumber'] ?>" + "</td></tr>" +
                    "<table>");
            });
        <?php } ?>
        // End Catch Peta Dasar
    </script>
</div>