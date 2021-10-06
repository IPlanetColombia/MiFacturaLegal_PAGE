<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/favicon/32x32.png">
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


    <!-- Author -->
    <meta name="author" content="Iplanet Colombia SAS">
    <!-- description -->
    <meta name="description" content="Potencie su negocio; todos los planes incluyen certificado digital, los módulos de emisión y recepción de facturas, documento soporte y nómina electrónica. Tambien se incluye cartera Online y cotizaciones.">
    <!-- keywords -->
    <meta name="keywords" content="Factura, Factura electrónica, documento soporte, nómina electrónica, DIAN, certificado digital">
    <!-- Page Title -->
    <title>MiFacturaLegal.com - Factura y Nómina Electrónica</title>

    <!-- CSS  -->
    <link href="./assets/css/myStyle.css" type="text/css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="90">
<?php
if(isset($_GET['success'])){
    echo  '<div class="alert alert-success" role="alert" style="position:absolute; width:100%;z-index:1000;"><strong>
                                Transaccíon Exitosa!!!. Sus datos fueron enviados, recibirá un correo con la documentación necesaria. Gracias.</strong><button type="button" class="close fa-2x" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                                 </div>';
    // unset($_SESSION['correo']);
}elseif(isset($_SESSION['error'])){
    echo  '<div class="alert alert-warning" role="alert" style="position:absolute; width:100%; z-index:1000;"><strong>
                                No se Puede realizar la el Pago.</strong><button type="button" class="close fa-2x" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                                </div>';
    unset($_SESSION['error']);
}elseif(isset($_SESSION['correo'])){
    echo  '<div class="alert alert-success" role="alert" style="position:absolute; width:100%; z-index:1000;"><strong>Datos enviados con exíto.</strong><button type="button" class="close fa-2x" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                                </div>';
    unset($_SESSION['correo']);
}

?>
<style>
    .fondo-gradian{
        background: rgb(128,33,181) !important;
        background: linear-gradient(95deg, rgba(128,33,181,1) 0%, rgba(242,40,88,1) 100%, rgba(243,40,87,1) 100%) !important;
        color: white;
    }
    .fondo-transparente{
        background-color:rgba(0, 0, 0, 0);
        transition: 0.2s;
    }
    .fondo-container-home{
        background-image: url('secciones/img/RECUADRO-1024X512.png');
        background-repeat: no-repeat;
        background-position: 185% 0%;
        background-size: 90% 105%; width:100%;
    }
    .fondo-seccion-home{
        background-image: url('secciones/img/FONDO-1080X608-4.jpg') ;
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    .texto-nuevo{
        color: white;
    }
    .inputs-portafolio{
        width: 50%;
    }
    .background-s-portafolio{
        background-color: #F9F4FB;
    }
    .no-border{
        border: none;
    }
    #home-dm{
        display: block;
    }
    #home-sm{
        display: none;
    }
    #logo-fml-nav{
        display: none;
    }
    #botones-nav{
        display: block;
    }

    @media only screen and (min-width : 350px) and (max-width : 600px) {
        .texto-nuevo{
            color: black;
        }
        .fondo-container-home{
            background-image: url('');
            background-repeat: no-repeat;
            background-position: 185% 0%;
            background-size: 90% 105%; width:100%;
        }
        .fondo-seccion-home{
            background-image: url('') !important;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        .inputs-portafolio{
            width: 100%;
        }
        .image-portafolio{
            display:none;
        }
        #home-dm{
            display: none;
        }
        #home-sm{
            display: block;
        }
        #img-logo-home{
            width: 98%;
        }
        #logo-fml-nav{
            display: block;
        }
        #botones-nav{
            display: none;
        }
        .fondo-transparente{
            background: rgb(128,33,181) !important;
            background: linear-gradient(95deg, rgba(128,33,181,1) 0%, rgba(242,40,88,1) 100%, rgba(243,40,87,1) 100%) !important;
            color: white;
        }
        .home-id{
            color: white !important;
        }
        .btnMFL {
            border: 2px solid #fa2851;
            margin: 0 5px;
            border-radius: 20px;
            text-align: center;
            background-color: #d06f8f;
        }
    }
</style>
<?php
include('secciones/header.php');
include('secciones/home.php');
include('secciones/pasos.php');
echo '<hr>';
include('secciones/modulos.php');
include('secciones/precios.php');
include('secciones/comparaciones.php');
include('secciones/solicitar_portafolio.php');
include('secciones/nosotros.php');
include('secciones/footer.php');
include('secciones/modals.php');
?>
<!--  Scripts-->
<script src="secciones/jquery-3.6.0.min.js"></script>
<script>
    if(window.screen.width > 400){
        window.addEventListener("scroll", scrollFunction);
        //window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                $('#menu').removeClass('fondo-transparente').addClass('fondo-gradian');
            } else if(document.body.scrollTop < 50 || document.documentElement.scrollTop > 50) {
                $('#menu').removeClass('fondo-gradian').addClass('fondo-transparente');
            }else{

            }
        }
    }


</script>
<!--  ScriptMisChats -->
<script src="https://mischats.com/supportboard/js/min/jquery.min.js"></script>
<script id = "sbinit" src = "https://mischats.com/supportboard/js/main.js?lang=es&mode=1"> </script>

<script src="assets/js/jquery.slim.min.js"></script>
<script src="assets/js/myJquery.js"></script>
<!-- <script src="<?=base_url()?>/assets/js/materialize.js"></script> -->
<!-- <script src="<?=base_url()?>/assets/js/init.js"></script>
  <script>
    var myCarousel = document.querySelector('#myCarousel')
var carousel = new bootstrap.Carousel(myCarousel, {
  interval: 30,
  wrap: false
})
  </script>-->
  <script src="vendor/js/bundle.min.js"></script>
<!-- Plugin Js -->
<script src="vendor/js/jquery.appear.js"></script>
<script src="vendor/js/jquery.fancybox.min.js"></script>
<script src="vendor/js/owl.carousel.min.js"></script>
<script src="vendor/js/parallaxie.min.js"></script>
<script src="vendor/js/wow.min.js"></script>
<script src="vendor/js/query.cubeportfolio.min.js"></script>
<script src="assets/js/jquery.slim.min.js"></script>
<script src="assets/js/myJquery.js"></script>
<!--Tilt Js-->
<script src="vendor/js/TweenMax.min.js"></script>
<!-- custom script-->
<script src="seo-agency/js/circle-progress.min.js"></script>
<script type="text/javascript" src="https://checkout.epayco.co/checkout.js">   </script>
<script src="seo-agency/js/script.js"></script>


</body>
</html>

