<div class="card-body">
    <div class="content">
        <div data-aos="fade-up" id="map" style="width: 100%; height: 120vh; color:black;"></div>
    </div>
    <script>
        var kec_brangsong = new L.LayerGroup();
        var kec_cepiring = new L.LayerGroup();
        var kec_kangkung = new L.LayerGroup();
        var kec_kendal = new L.LayerGroup();
        var kec_ngampel = new L.LayerGroup();
        var kec_patebon = new L.LayerGroup();
        var kec_pegandon = new L.LayerGroup();
        var kec_boja = new L.LayerGroup();
        var kec_gemuh = new L.LayerGroup();
        var kec_kaliwungu = new L.LayerGroup();
        var kec_kaliwungu_selatan = new L.LayerGroup();
        var kec_limbangan = new L.LayerGroup();
        var kec_plantungan = new L.LayerGroup();
        var kec_pageruyung = new L.LayerGroup();
        var kec_patean = new L.LayerGroup();
        var kec_ringinarum = new L.LayerGroup();
        var kec_rowosari = new L.LayerGroup();
        var kec_singorojo = new L.LayerGroup();
        var kec_sukorejo = new L.LayerGroup();
        var kec_weleri = new L.LayerGroup();

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
                "<table>");
        <?php } ?>
        // End Catch Peta Dasar
    </script>
</div>