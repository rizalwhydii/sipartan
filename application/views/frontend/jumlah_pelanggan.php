<!-- ======= Breadcrumbs Section ======= -->
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

<div class="card-body">
    <div class="content">
        <div data-aos="fade-up" id="map" style="width: 100%; height: 90vh; color:black;"></div>
    </div>
    <script>
        var admin = new L.LayerGroup();

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

        var Esri_WorldTopoMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community'
        });

        var g_satellite = new L.Google('SATELLITE');
        var g_roadmap = new L.Google('ROADMAP');
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
            'Esri Topomap': Esri_WorldTopoMap

        };

        var groupedOverlays = {
            "Data": {
                "Jumlah Pelanggan": admin
            },
        }


        labelEngine = new labelgun.default(hideLabel, showLabel);

        var id = 0;
        var labels = [];
        var totalMarkers = 0;

        function resetLabels(markers) {
            labelEngine.reset();
            var i = 0;
            for (var j = 0; j < markers.length; j++) {
                markers[j].eachLayer(function(label) {
                    addLabel(label, ++i);
                });
            }
            labelEngine.update();
        }

        // Map Feature
        admin.addTo(map);
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
        // Legenda
        var legenda = L.control({
            position: "bottomleft"
        });
        legenda.onAdd = function(map) {
            var div = L.DomUtil.create("div", "info legend");
            div.innerHTML = '<img width="135" src="<?= base_url('assets/img/legenda.png') ?>
            ">';
            return div;
        }
        legenda.addTo(map);
        // End Legenda

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

        <?php foreach ($dataA as $key => $value) { ?>
            admin = L.geoJSON(<?= $value['shape']; ?>, {
                style: {
                    weight: 2,
                    fillColor: '<?= $value['color'] ?>',
                    fillOpacity: 0.75,
                },
            }).addTo(admin);
            admin.eachLayer(function(layer) {
                layer.bindPopup("<table class='table table-striped table-bordered table-condensed'>" +
                    "<tr><th>Kecamatan</th><td>" + "<?= $value['wadmkc']; ?>" + "</td></tr>" +
                    "<tr><th>Jumlah SR</th><td>" + "<?= $value['jml_plgn']; ?>" + "</td></tr>" +
                    "<tr><th>Klasifikasi Pelanggan</th><td>" + "<?= $value['class']; ?>" + "</td></tr>" +
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
            }).addTo(admin).bindTooltip('<?= $value['wadmkc']; ?>', {
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
            }).addTo(admin).bindTooltip('<?= $value['jml_plgn']; ?>', {
                direction: "center",
                offset: L.point(0, 20),
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
    </script>
</div>