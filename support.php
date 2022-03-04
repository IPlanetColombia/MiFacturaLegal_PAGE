<?php
	include('./php/conection.php');
	$conection = new Conection();
	$query = "SELECT * FROM head";
	$general = mysqli_fetch_array($conection->conection()->query($query));


  
  $array = [
    ['title' => 'Facturación Electrónica', 'img' => 'icono-factura.png',
      'questions' => [
        ['id' => 1, "title" => "¿Que es Facturación Electrónica?", 'question' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'],
        ['id' => 6, "title" => "¿Para que sirve Facturación Electrónica?", 'question' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'],
        ['id' => 7, "title" => "¿Como uso la Facturación Electrónica?", 'question' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'],
      ]
    ],
    ['title' => 'Documentos Soporte', 'img' => 'icono-documento.png',
      'questions' => [
        ['id' => 2, "title" => "¿Que es Documentos Soporte?", 'question' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'],
        ['id' => 8, "title" => "¿Como uso Documentos Soporte?", 'question' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'],
        ['id' => 9, "title" => "¿Como descargo Documentos Soporte?", 'question' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.']
      ]
    ],
    ['title' => 'Nómina Electrónica', 'img' => 'icono-nomina.png',
      'questions' => [
        ['id' => 3, "title" => "¿Que es Nómina Electrónica?", 'question' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.']
      ]
    ],
    ['title' => 'Recepción Documentos', 'img' => 'icono-recepcion.png',
      'questions' => [
        ['id' => 4, "title" => "¿Que es Recepción Documentos?", 'question' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.']
      ]
    ],
    ['title' => 'Soporte', 'img' => 'icono-soporte.png',
      'questions' => [
        ['id' => 5, "title" => "¿Que es Soporte?", 'question' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.']
      ]
    ],
  ];
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
	<link rel="stylesheet" type="text/css" href="./php/assets/css/support.css">
    <link rel="stylesheet" type="text/css" href="./php/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="./php/assets/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="./php/EasyAutocomplete/easy-autocomplete.css">
    <link rel="stylesheet" type="text/css" href="./php/EasyAutocomplete/easy-autocomplete.themes.min.css">
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
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="90">
  <?php include('./php/header.php'); ?>

  <div class="text-white s-principal">
    <!-- <img src="https://img.freepik.com/foto-gratis/secretaria-trabajando-documentos-estadisticos_1098-3363.jpg" class="card-img" alt="..."> -->
    <div class="contenido">
      <div class="position-absolute bottom-0 p-5 div-bottom">
        <div class="input-group mb-3">
          <input type="text" id="search" class="form-control" placeholder="Buscar pregunta" aria-label="Username" aria-describedby="basic-addon1">
        </div>
      </div>
    </div>
  </div>

  <div class="container pt-2">
    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb p-5">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $base_url ?>">Home <i data-feather="chevron-right"></i></a></li>
        <li class="breadcrumb-item active">Central de ayuda</li>
      </ol>
    </nav>
  </div>

  <div class="container pt-5 pb-5 preguntas-container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($array as $detail): ?>
          <div class="col preguntas ">
            <div class="card h-100">
              <div class="img-preguntas">
                <div>
                  <img src="./php/img/home/<?= $detail['img'] ?>" class="preguntas card-img-top" alt="...">
                </div>
              </div>
              <div class="card-body">
                <h5 class="card-title text-center"><?= $detail['title'] ?></h5>
                <ul>
                  <?php foreach($detail['questions'] as $question): ?>
                    <li><span onclick="active_modal(<?= $question['id'] ?>)"><i data-feather="chevrons-right"></i> <?= $question['title'] ?></span></li>
                  <?php endforeach ?>
                </ul>
              </div>
              <div class="card-footer">
                <a href="<?= $base_url ?>/support_detail.php" class="btn my-boton">Saber más</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title-modal"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 id="sub-title-modal"></h5>
        <p id="description-modal"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn my-boton" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



  <?php include('./php/footer.php'); ?>

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
  <script>
      feather.replace()
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
  <script src="./php/EasyAutocomplete/jquery.easy-autocomplete.js"></script>
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
  <script>
    function return_array (){
      var array = <?php echo json_encode($array);?>;
      return array;
    }
    function type_support(){
      return 1;
    }
  </script>
  <script src="./php/assets/js/support.js"></script>

</body>
</html>