<?php
$url = file_get_contents("http://localhost:8080/geoserver/tirta_workspace/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=tirta_workspace%3Akec_pelanggan&maxFeatures=50&outputFormat=application%2Fjson");
echo ($url);
