<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
     <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Author -->
    <meta name="author" content="Iplanet Colombia SAS">
    <!-- description -->
    <meta name="description" content="Potencie su negocio; todos los planes incluyen certificado digital, los módulos de emisión y recepción de facturas, documento soporte y nómina electrónica. Tambien se incluye cartera Online y cotizaciones.">
    <!-- keywords -->
    <meta name="keywords" content="Factura, Factura electrónica, documento soporte, nómina electrónica, DIAN, certificado digital">
    <!-- Page Title -->
    <title>Mi Factura Legal - Factura y Nómina Electrónica</title>
    <!-- Favicon -->
    <link href="" rel="icon">
    <!-- Bundle -->
    <link href="vendor\css\bundle.min.css" rel="stylesheet">
    <!-- Plugin Css -->
    <link href="seo-agency\css\line-awesome.min.css" rel="stylesheet">
    <link href="vendor\css\revolution-settings.min.css" rel="stylesheet">
    <link href="vendor\css\jquery.fancybox.min.css" rel="stylesheet">
    <link href="vendor\css\owl.carousel.min.css" rel="stylesheet">
    <link href="vendor\css\cubeportfolio.min.css" rel="stylesheet">
    <link href="vendor\css\LineIcons.min.css" rel="stylesheet">
    <link href="seo-agency\css\slick.css" rel="stylesheet">
    <link href="seo-agency\css\slick-theme.css" rel="stylesheet">
    <link href="vendor\css\wow.css" rel="stylesheet">
    <!-- Style Sheet -->
    <link href="seo-agency\css\blog.css" rel="stylesheet">
    <link href="seo-agency\css\style.css" rel="stylesheet">
    <link href="seo-agency\css\prueba.css" rel="stylesheet">
    <link rel="stylesheet" href="https://mischats.com/supportboard/media/icons/png/style.css">

   
     <link rel="shortcut icon" href="https://facturadorv2.mifacturalegal.com/assets/img/42x42.png">

    <link rel="stylesheet" href="vendor\css\preloader.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">
<!-- Preloader 
<div class="preloader">
    <div class="center">
        <div class="spinner">
            <div class="blob top"></div>
            <div class="blob bottom"></div>
            <div class="blob left"></div>
            <div class="blob move-blob"></div>
        </div>
    </div>
</div>
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>-->
<?php
session_start();

include('header.php');
include('banner.php');

include('explicacion.php');
include('caracteristicas.php');

##include('pasos.php');
include('ingreso_demo.php');
include('planes.php');
include('ingreso_demo.php');
include('contacto.php');

?>

<!--Animated Cursor-->
<div class="aimated-cursor">
    <div class="cursor">
        <div class="cursor-loader"></div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://mischats.com/supportboard/js/min/jquery.min.js"></script>
<script id = "sbinit" src = "https://mischats.com/supportboard/js/main.js?lang=es&mode=1"> </script> 
<script src="vendor\js\bundle.min.js"></script>
<!-- Plugin Js -->
<script src="vendor\js\jquery.appear.js"></script>
<script src="vendor\js\jquery.fancybox.min.js"></script>
<script src="vendor\js\owl.carousel.min.js"></script>
<script src="vendor\js\parallaxie.min.js"></script>
<script src="vendor\js\wow.min.js"></script>
<script src="vendor\js\jquery.cubeportfolio.min.js"></script>
<script src="./assets/js/jquery.slim.min.js"></script>
<script src="./assets/js/myJquery.js"></script>

<!--Tilt Js-->
<script src="vendor\js\TweenMax.min.js"></script>
<!-- custom script-->
<script src="seo-agency\js\circle-progress.min.js"></script>

<script src="seo-agency\js\script.js"></script>
<script type="text/javascript" src="https://checkout.epayco.co/checkout.js">   </script>
<script>
    $(document).ready(function () {
    "use strict";
    //Preloader js
    $(document).ready(function() {
        setTimeout(function(){
            $('body').addClass('loaded');
        }, 3000);
    }); 
}); 
</script>
</body>
</html>