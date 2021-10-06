<!--indicators -->
<div class="container">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <!--<h1>Indicadores</h1> -->
    </div>
    <div class="row">
         <!--<div class="col-sm-12 col-md-4">
            <div class="card-indicator animate fadeLeft">
                <div class="card-content">
                    <h6 class="mb-0 mt-0 d-flex justify-content-center" >Facturas de Venta
                    </h6>
                    <p class="medium-small text-center" style="color:black;">Emitidas</p>
                    <div class="current-balance-container">
                        <div id="current-balance-donut-chart-invoices" class="current-balance-shadow"></div>
                    </div>
                    <h5 class="text-center" style="color:black;"></h5>
                   <!-- <p class="medium-small text-center" style="color:black;">Used balance this billing cycle</p>-->
        <!--        </div>
            </div>
        </div>-->
        <!-- indicator invoices-->
       <!-- <div class="col-sm-12 col-md-4">
            <div class="card-indicator gradient-45deg-purple-deep-purple text-white gradient-shadow min-height-100">
                <div class="padding-4" >
                    <div class="row">
                        <div class="col-sm-7 col-md-7">
                            <i class="material-icons background-round mt-5-indicator">receipt</i>
                            <p class="margin-top-20">Facturas de Venta</p>
                        </div>
                        <div class="col-sm-5 col-md-5 right-align">
                            <h5 class="mb-0 white-text card-indicator-title" id="invoices"></h5>
                            <p class="no-margin font-size-14">Enviadas a la DIAN</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- indicator invoices end -->
        <!-- indicator invoices-->
        <!--<div class="col-sm-12 col-md-4">
            <div class="card-indicator gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeRight">
                <div class="padding-4">
                    <div class="row">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5-indicator">file_download</i>
                            <p class="margin-top-20" >Notas Crédito</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0 white-text card-indicator-title" id="credit_note"></h5>
                            <p class="no-margin font-size-14">Enviadas a la DIAN</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

      <!--  <div class="col-sm-12 col-md-4">
            <div class="card-indicator animate fadeLeft">
                <div class="card-content">
                    <h6 class="mb-0 mt-0 d-flex justify-content-center" >Notas Crédito
                    </h6>
                    <p class="medium-small text-center" style="color:black;">Emitidas</p>
                    <div class="current-balance-container">
                        <div id="current-balance-donut-chart-credit-note" class="current-balance-shadow"></div>
                    </div>
                    <h5 class="text-center" style="color:black;"></h5>
                    <!-- <p class="medium-small text-center" style="color:black;">Used balance this billing cycle</p>-->
          <!--      </div>
            </div>
        </div>->
        <!-- indicator invoices end -->

        <!-- indicator invoices-->
        <!--<div class="col-sm-12 col-md-4">
            <div class="card-indicator  gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                <div class="padding-4">
                    <div class="row">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5-indicator">file_upload</i>
                            <p class="margin-top-20" >Notas Débito</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0 white-text card-indicator-title" id="debit_note"></h5>
                            <p class="no-margin font-size-14">Enviadas a la DIAN</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- <div class="col-sm-12 col-md-4">
            <div class="card-indicator animate fadeLeft">
                <div class="card-content">
                    <h6 class="mb-0 mt-0 d-flex justify-content-center" >Notas Débito
                    </h6>
                    <p class="medium-small text-center" style="color:black;">Emitidas</p>
                    <div class="current-balance-container">
                        <div id="current-balance-donut-chart-debit-note" class="current-balance-shadow"></div>
                    </div>
                    <h5 class="text-center" style="color:black;"></h5>
                    <!-- <p class="medium-small text-center" style="color:black;">Used balance this billing cycle</p>-->
            <!--     </div>
            </div>
        </div> ->
        <!-- indicator invoices end -->
    </div>
</div>
<!--indicators end -->
<?php



$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://facturadorv2.mifacturalegal.com/api/v2/logo_images",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 50,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "accept: application/json"
    ),
));

$response = curl_exec($curl);
curl_close($curl);
$data = json_decode($response);


?>

<div class="container">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1>Nuestros clientes</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <section class="regular slider">
                <?php foreach ($data as $item): ?>
                <div style="width: 100%; height: 100px ;display: block;">
                    <img src="<?= $item->logo ?>" style="display: block;" width="100px" height="100px">
                </div>
                <?php endforeach; ?>
            </section>
        </div>
    </div>

</div>
