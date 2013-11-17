<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>                                                                                                                                                                                                                              
<html lang="en-US">                                                                                                                                                                                                                          
<head>                                                                                                                                                                                                                                       
  <title>NextGen MFS [Ingestion Dashboard]</title>
  <meta charset="utf-8">                                                                                                                                                                                                                     
  <link rel="stylesheet" href="views/templates/mfs/assets/css/global.css" type="text/css">                                                                                                                                                                       
  <script src="views/templates/mfs/assets/js/jquery-1.7.1.min.js"></script>                                                                                                                                                                                      
  <script src="views/templates/mfs/assets/js/bootstrap.min.js"></script>                                                                                                                                                                                         
  <script src="views/templates/mfs/assets/js/admin.min.js"></script>                                                                                                                                                                                             
  <script src="views/templates/mfs/assets/js/main.js"></script>                                                                                                                                                                                      
  <script src="http://code.highcharts.com/highcharts.js"></script>                                                                                                                                                                           
  <script src="http://code.highcharts.com/modules/exporting.js"></script>                                                                                                                                                                    
  <script src="views/templates/mfs/assets/js/download_bars.js"></script>
  <link rel="stylesheet" href="views/templates/mfs/assets/css/leaflet.css" />
  <!--[if lte IE 8]><link rel="stylesheet" href="../dist/leaflet.ie.css" /><![endif]-->
  <style type="text/css">
    #map { width: 937px; height: 433px; }
    .leaflet-control-zoom-fullscreen { background-image: url(views/templates/mfs/assets/img/icon-fullscreen.png); }
    /* on selector per rule as explained here : http://www.sitepoint.com/html5-full-screen-api/ */
    #map:-webkit-full-screen { width: 100% !important; height: 100% !important; }
    #map:-moz-full-screen { width: 100% !important; height: 100% !important; }
    #map:full-screen { width: 100% !important; height: 100% !important; }
  </style>
  <script src="views/templates/mfs/assets/js/leaflet.js"></script>
  <script src="views/templates/mfs/assets/js/Control.FullScreen.js"></script>
  <script src="views/templates/mfs/assets/js/leaflet-providers.js"></script>
</head>                                                                                                                                                                                                                                      
