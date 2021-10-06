<?php
	include('./php/conection.php');
	$conection = new Conection();
	$query = "SELECT * FROM head";
	$general = mysqli_fetch_array($conection->conection()->query($query));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $general['title'] ? $general['title']:'IplanetColombia' ?></title>

	<link href="./php/vendor/css/bundle.min.css" rel="stylesheet">
	<link href="./php/seo-agency/css/line-awesome.min.css" rel="stylesheet">
	<link href="./php/vendor/css/revolution-settings.min.css" rel="stylesheet">
	<link href="./php/vendor/css/jquery.fancybox.min.css" rel="stylesheet">
	<link href="./php/vendor/css/owl.carousel.min.css" rel="stylesheet">
	<link href="./php/vendor/css/cubeportfolio.min.css" rel="stylesheet">
	<link href="./php/vendor/css/LineIcons.min.css" rel="stylesheet">
	<link href="./php/seo-agency/css/slick.css" rel="stylesheet">
	<link href="./php/seo-agency/css/slick-theme.css" rel="stylesheet">
	<link href="./php/vendor/css/wow.css" rel="stylesheet">
	<link href="./php/seo-agency/css/blog.css" rel="stylesheet">
	<link href="./php/seo-agency/css/style.css" rel="stylesheet">
	<link href="./php/seo-agency/css/prueba.css" rel="stylesheet">
	<link rel="stylesheet" href="https://mischats.com/supportboard/media/icons/png/style.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
	<link rel="shortcut icon" href="<?= $general['favicon'] ? './php/img/head/'.$general['favicon']:'./php/assets/img/favicon/32x32.png' ?>">
    <link rel="stylesheet" href="./php/assets/css/chartist.min.css">
	<style type="text/css">
		@font-face {
		  font-weight: 400;
		  font-style:  normal;
		  font-family: 'Circular-Loom';

		  src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Book-cd7d2bcec649b1243839a15d5eb8f0a3.woff2') format('woff2');
		}

		@font-face {
		  font-weight: 500;
		  font-style:  normal;
		  font-family: 'Circular-Loom';

		  src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Medium-d74eac43c78bd5852478998ce63dceb3.woff2') format('woff2');
		}

		@font-face {
		  font-weight: 700;
		  font-style:  normal;
		  font-family: 'Circular-Loom';

		  src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Bold-83b8ceaf77f49c7cffa44107561909e4.woff2') format('woff2');
		}

		@font-face {
		  font-weight: 900;
		  font-style:  normal;
		  font-family: 'Circular-Loom';

		  src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Black-bf067ecb8aa777ceb6df7d72226febca.woff2') format('woff2');
		}
	</style>
	<link id="support-board" rel="stylesheet" type="text/css" href="https://mischats.com/supportboard/css/min/main.min.css?v=3.2.9" media="all">
	<link rel="stylesheet" type="text/css" href="./php/assets/css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="./php/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="./php/assets/css/slick-theme.css">
    <style>
        .slick-slide {
            margin: 0px 20px;
            height: 250px;
        }
        .slick-slide img {
            display: block;
            width: 100%;
            height: 250px;
            object-fit: contain;
        }
        .slick-prev:before,
        .slick-next:before {
            color: black;
        }
        .slick-slide {
            transition: all ease-in-out .3s;
            opacity: .2;
        }
        .slick-active {
            opacity: .5;
        }
        .slick-current {
            opacity: 1;
        }
        .current-balance-container
        {
            position: relative;
            height: 170px;
        }
        .current-balance-container > *
        {
            position: absolute;
            width: 100%;
        }
        #current-balance-donut-chart-invoices
        {
            height: 170px;
            -webkit-filter: drop-shadow(0px 10px 4px rgba(133, 3, 168, .2));
            filter: drop-shadow(0px 10px 4px rgba(133, 3, 168, .2));
        }
        #current-balance-donut-chart-invoices .ct-series-a .ct-slice-donut
        {
            stroke: #ff4bac;
        }
        #current-balance-donut-chart-invoices .ct-series-b .ct-slice-donut
        {
            stroke: #f6f6f6;
        }
        #current-balance-donut-chart-credit-note
        {
            height: 170px;
            -webkit-filter: drop-shadow(0px 10px 4px rgba(133, 3, 168, .2));
            filter: drop-shadow(0px 10px 4px rgba(133, 3, 168, .2));
        }
        #current-balance-donut-chart-credit-note .ct-series-a .ct-slice-donut
        {
            stroke: #ff4bac;
        }
        #current-balance-donut-chart-credit-note  .ct-series-b .ct-slice-donut
        {
            stroke: #f6f6f6;
        }
        #current-balance-donut-chart-debit-note
        {
            height: 170px;
            -webkit-filter: drop-shadow(0px 10px 4px rgba(133, 3, 168, .2));
            filter: drop-shadow(0px 10px 4px rgba(133, 3, 168, .2));
        }
        #current-balance-donut-chart-debit-note .ct-series-a .ct-slice-donut
        {
            stroke: #ff4bac;
        }
        #current-balance-donut-chart-debit-note .ct-series-b .ct-slice-donut
        {
            stroke: #f6f6f6;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="90">
	<?php
	  session_start();
		include('./php/header.php');
		include('./php/home.php');
		include('./php/pasos.php');
		include('./php/modulos.php');
		include('./php/precios.php');
       
		include('./php/comparaciones.php');
		include('./php/solicitar_portafolio.php');
		include('./php/indicators.php');
		include('./php/nosotros.php');
		include('./php/footer.php');
		include('./php/modals.php');
	?>
	<script src="./php/jquery-3.6.0.min.js"></script>
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
	<script src="https://mischats.com/supportboard/js/min/jquery.min.js"></script>
	<script id="sbinit" src="https://mischats.com/supportboard/js/main.js?lang=es&amp;mode=1"> </script>
	<script src="./php/assets/js/jquery.slim.min.js"></script>
	<script src="./php/assets/js/myJquery.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./php/assets/js/slick.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./php/assets/js/chart.min.js"></script>
    <script src="./php/assets/js/chartist.min.js"></script>
    <script src="./php/assets/js/chartist-plugin-tooltip.js"></script>
    <script src="./php/assets/js/chartist-plugin-fill-donut.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".regular").slick({
                dots: true,
                infinite: true,
                autoplay: true,
                slidesToShow: 4,
                slidesToScroll: 4
            });
        });
        (function (window, document, $) {
            axios({
                method: 'get',
                url: 'https://facturadorv2.mifacturalegal.com/api/v2/indicators',
                responseType: 'json'
            }).then(function (response) {
               var invoices = parseInt(response.data.data.invoices_national) + parseInt(response.data.data.invoices_export);
               var noteCredit = parseInt(response.data.data.credit_note);
               var noteDebit = parseInt( response.data.data.debit_note);
                var CurrentBalanceDonutChart = new Chartist.Pie(
                    "#current-balance-donut-chart-invoices",
                    {
                        labels: [1, 2],
                        series: [
                            { meta: "Completed", value: 80 },
                            { meta: "Remaining", value: 20 }
                        ]
                    },
                    {
                        donut: true,
                        donutWidth: 8,
                        showLabel: false,
                        plugins: [
                            Chartist.plugins.tooltip({
                                class: "current-balance-tooltip",
                                appendToBody: true
                            }),
                            Chartist.plugins.fillDonut({
                                items: [
                                    {
                                        content:
                                            `<p class="small">Total</p>
                                            <h5 class="mt-0 mb-0 text-center">${invoices}</h5>`
                                    }
                                ]
                            })
                        ]
                    }
                );
                var CurrentBalanceDonutChartCredit = new Chartist.Pie(
                    "#current-balance-donut-chart-credit-note",
                    {
                        labels: [1, 2],
                        series: [
                            { meta: "Completed", value: 80 },
                            { meta: "Remaining", value: 20 }
                        ]
                    },
                    {
                        donut: true,
                        donutWidth: 8,
                        showLabel: false,
                        plugins: [
                            Chartist.plugins.tooltip({
                                class: "current-balance-tooltip",
                                appendToBody: true
                            }),
                            Chartist.plugins.fillDonut({
                                items: [
                                    {
                                        content:
                                            `<p class="small">Total</p>
                                            <h5 class="mt-0 mb-0 text-center">${noteCredit}</h5>`
                                    }
                                ]
                            })
                        ]
                    }
                );
                var CurrentBalanceDonutChartDebit = new Chartist.Pie(
                    "#current-balance-donut-chart-debit-note",
                    {
                        labels: [1, 2],
                        series: [
                            { meta: "Completed", value: 80 },
                            { meta: "Remaining", value: 20 }
                        ]
                    },
                    {
                        donut: true,
                        donutWidth: 8,
                        showLabel: false,
                        plugins: [
                            Chartist.plugins.tooltip({
                                class: "current-balance-tooltip",
                                appendToBody: true
                            }),
                            Chartist.plugins.fillDonut({
                                items: [
                                    {
                                        content:
                                            `<p class="small">Total</p>
                                            <h5 class="mt-0 mb-0 text-center">${noteDebit}</h5>`
                                    }
                                ]
                            })
                        ]
                    }
                );
            });
        })(window, document, jQuery)
    </script>
</body>
</html>