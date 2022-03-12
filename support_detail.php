<?php
	include('./php/conection.php');
	$conection = new Conection();
	$query = "SELECT * FROM head";
	$general = mysqli_fetch_array($conection->conection()->query($query));
  $array = $conection->conection_pdo()->query("Select * From home_detail")->fetchAll(PDO::FETCH_OBJ);
  foreach($array as $key => $modulo){
    $questions = $conection->conection_pdo()->query("Select * From question where home_detail_id = $modulo->id order by orden ASC")->fetchAll(PDO::FETCH_OBJ);
    $array[$key]->questions = $questions;
    foreach($questions as $llave => $pregunta){
      $question = $conection->conection_pdo()->query("Select * From detail_question where question_id = $pregunta->id order by orden ASC")->fetchAll(PDO::FETCH_OBJ);
      $array[$key]->questions[$llave]->preguntas = $question;
    }
  }
  $id = !empty($_GET['option']) ? $_GET['option'] : 1;
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
        <li class="breadcrumb-item"><a href="<?= $base_url ?>support.php">Central de ayuda <i data-feather="chevron-right"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalles</li>
      </ol>
    </nav>
  </div>

  <div class="pt-5 pb-5">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-4">
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <?php foreach ($array as $key => $detail): ?>
            <?php if(!empty($detail->questions)): ?>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading">
                  <button class="accordion-button <?= $detail->id == $id ? 'show': 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $key ?>" aria-expanded="false" aria-controls="flush-collapse<?= $key ?>">
                  <?= $detail->title ?>
                  </button>
                </h2>
                <div id="flush-collapse<?= $key ?>" class="accordion-collapse collapse <?= $detail->id == $id ? 'show': '' ?>" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <ul>
                      <?php foreach($detail->questions as $question): ?>
                        <?php if($detail->id == $id): ?>
                          <li>
                            <a href="#<?= str_replace(" ", "-",$question->title)?>"><?= $question->title ?></a>
                          </li>
                        <?php else: ?>
                          <li>
                            <a href="<?= $base_url ?>support_detail.php?option=<?= $detail->id?>#<?= str_replace(" ", "-",$question->title)?>"><?= $question->title ?></a>
                          </li>
                        <?php endif ?>
                      <?php endforeach ?>
                    </ul>
                  </div>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-8 p-5">
        <?php foreach ($array as $detail): ?>
          <?php if($detail->id == $id): ?>
            <h2 class="text-center text-capitalize"><?= $detail->title ?></h2>
            <?php foreach($detail->questions as $question): ?>
              <h4 id="<?= str_replace(" ", "-",$question->title)?>"><?= $question->title ?></h4>
              <hr>
              <?php foreach ($question->preguntas as $answer): ?>
                <div >
                  <h5><?= $answer->title ?></h5>
                  <?= $answer->text ?>
                  <?php if(!empty($answer->img)): ?>
                    <img src="<?= $base_url ?>php/img/question/<?= $answer->img?>" class="img-fluid" alt="...">
                  <?php elseif(!empty($answer->video)): ?>
                    <div class="ratio ratio-16x9">
                      <?= $answer->video ?>
                      <!-- <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video" allowfullscreen></iframe> -->
                    </div>
                  <?php endif ?>
                </div>
              <?php endforeach ?>
              <br><br>

            <?php endforeach ?>
          <?php endif ?>
        <?php endforeach ?>
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
      var array = <?php echo json_encode($array) ?>;
      return array;
    }
    function type_support(){
      return 2;
    }
    function id_detail(){
      var id = <?php echo $id ?>;
      return id;
    }
    function base_url_php(){
      var base = '<?php echo $base_url ?>';
      return base;
    }
  </script>
  <script src="./php/assets/js/support.js"></script>
  
</body>
</html>