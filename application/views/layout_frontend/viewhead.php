<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIPARTAN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/frontend/assets/img/icon-web.png" rel="icon">
  <link href="<?= base_url() ?>assets/frontend/assets/img/icon-web.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/frontend/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/frontend/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/frontend/assets/css/style.css" rel="stylesheet">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/sweetalert2/sweetalert2.min.css">
  <script src="<?= base_url('assets/template/plugins/sweetalert2/'); ?>sweetalert2.min.js"></script>

  <!-- Maps -->
  <!-- Jquery -->
  <script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false&key=AIzaSyBXTXgQ7wZPndgKZilAsFVZjT5YWMr9WFs"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Leaflet -->
  <link rel="stylesheet" href="<?= base_url('assets/leaflet/'); ?>leaflet.css" />
  <script src="<?= base_url('assets/leaflet/') ?>leaflet.js"></script>

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugin/leaflet.groupedlayercontrol.css" />
  <script src="<?= base_url() ?>assets/plugin/leaflet.groupedlayercontrol.js"></script>

  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugin/L.Control.ZoomBar.css" />
  <script type="text/javascript" src="<?= base_url() ?>assets/plugin/L.Control.ZoomBar.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

  <script type="text/javascript" src="<?= base_url() ?>assets/plugin/Leaflet.Coordinates-0.1.5.min.js"></script>
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugin/Leaflet.Coordinates-0.1.5.css" />

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugin/leaflet-measure-master/leaflet-measure.css">
  <script src="<?= base_url() ?>assets/plugin/leaflet-measure-master/leaflet-measure.js"></script>

  <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css">
  <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugin/MarkerCluster.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugin/MarkerCluster.Default.css" />
  <script src="<?= base_url() ?>assets/plugin/leaflet.markercluster-src.js"></script>
  <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
  <script src="https://github.com/leaflet-extras/leaflet-providers"></script>
  <!-- Labeling -->
  <script src="https://unpkg.com/rbush@2.0.2/rbush.min.js"></script>
  <script src="https://unpkg.com/labelgun@6.1.0/lib/labelgun.min.js"></script>
  <script src="<?= base_url('assets/leaflet/labels.js'); ?>"></script>

  <style>
    .styleLabelKecamatan {
      background: rgba(255, 255, 255, 0);
      border: 0;
      border-radius: 0px;
      box-shadow: 0 0px 0px;
      font-size: 10pt;
      color: white;
      text-shadow: 2px 2px 5px black;
      font-weight: bold;
    }

    .leaflet-mouse-marker {
      background-color: transparent !important;
    }
  </style>

  <!-- Leaflet Draw -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
  <!-- =======================================================
  * Template Name: BizPage
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <!-- 
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/berita/'); ?>styles/blog.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/berita/'); ?>styles/blog_responsive.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/berita/'); ?>styles/blog_single.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/berita/'); ?>styles/blog_single_responsive.css"> -->

</head>
<div class="flashData" id="flashData" data-message="<?= $this->session->flashdata('message'); ?>" data-tittle="<?= $this->session->flashdata('tittle'); ?>" data-icon="<?= $this->session->flashdata('icon'); ?>"></div>