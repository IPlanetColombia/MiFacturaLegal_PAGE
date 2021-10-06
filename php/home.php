<?php
    $conection = new Conection();
    $query_general = 'SELECT * FROM home_general';
    $query_detalles = 'SELECT * FROM home_detail';
    $data_general = mysqli_fetch_array($conection->conection()->query("SELECT * FROM head"));
    $general = mysqli_fetch_array($conection->conection()->query($query_general));
    $detail = $conection->conection()->query($query_detalles);
    $detail_2 = $conection->conection()->query($query_detalles);
?>
<section class="fondo-seccion-home" id="home">
    <div class="container-fluid fondo-container-home" id="home-dm" >
        <div class="row pt-5">
                            <?php
if(isset($_GET['success'])){
    echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Transaccíon Exitosa!!!. Sus datos fueron enviados, recibirá un correo con la documentación necesaria. Gracias.</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    // unset($_SESSION['correo']);
}elseif(isset($_SESSION['error'])){
    echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>No se Puede realizar la el Pago.</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    unset($_SESSION['error']);
}

?>
            <div class=" col-sm-4 col-md-4  col-lg-4 col-xl-4 d-flex align-items-center text-center ">
                <div class="slider-banner-content wow slideInLeft" data-wow-delay=".8s">
                    <br><br><br><br><br><br>
                    <div class="container">
                        <?php while($row = mysqli_fetch_assoc($detail)): ?>
                            <div class="col m-0 p-0">
                                <div class="card home p-0">
                                    <div class="card-body home p-0">
                                        <div class="" style="width: 85px !important; height: 85px !important;"><img
                                                    src="<?= $base_url ?>/php/img/home/<?= $row['img'] ?>" alt=""></div>
                                        <p class="text p-0 mt-3"><b><strong><?= $row['title'] ?></strong> </b>
                                            <br>

                                            <button type="button" class="btn btn-sm color-purple" data-bs-toggle="modal"
                                                    data-bs-target="#home_<?= $row['id'] ?>">
                                                Ver detalles
                                            </button>
                                            <a href="<?= $row['link_demo'] ?>"
                                               target="_blank" class="btn btn-sm color-purple">Ir al demo</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile ?>

                        <!-- <div class="col m-0 p-0">
                            <div class="card home p-0">
                                <div class="card-body home p-0">
                                    <div class="" style="width: 85px !important; height: 85px !important;"><img
                                                src="./php/secciones/img/icono-nomina.png" alt=""></div>
                                    <p class="text p-0 mt-3"><b><strong> Nómina Electrónica </strong> </b>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#nominaElectronica">
                                            Ver detalles
                                        </button>
                                        <a href="https://planeta-internet.com/mifacturalegal/public/home"
                                           target="_blank" class="btn btn-primary btn-sm">Ir al demo</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0">
                            <div class="card home p-0">
                                <div class="card-body home p-0">
                                    <div class="" style="width: 85px !important; height: 85px !important;"><img
                                                src="../../secciones/img/icono-documento.png" alt=""></div>
                                    <p class="text p-0 mt-3"><b> <strong> Documentos Soporte </strong> </b>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#documentoSoporte">
                                            Ver detalles
                                        </button>
                                        <a href="https://planeta-internet.com/mifacturalegal/public/document_support"
                                           target="_blank" class="btn btn-primary btn-sm">Ir al demo</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0">
                            <div class="card home p-0">
                                <div class="card-body home p-0">
                                    <div class="" style="width: 85px !important; height: 85px !important;"><img
                                                src="../../secciones/img/icono-recepcion.png" alt=""></div>
                                    <p class="text p-0 mt-3"><b><strong>Recepción Documentos</strong></b>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#recepcionDocumentos">
                                            Ver detalles
                                        </button>
                                        <a href="https://planeta-internet.com/mifacturalegal/public/documents/upload_files"
                                           target="_blank" class="btn btn-primary btn-sm">Ir al demo</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0">
                            <div class="card home p-0">
                                <div class="card-body home p-0">
                                    <div class="" style="width: 85px !important; height: 85px !important;"><img
                                                src="../../secciones/img/icono-soporte.png" alt=""></div>
                                    <p class="text p-0 mt-3"><b><strong>Soporte</strong></b>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#soporte">
                                            Ver detalles
                                        </button>
                                        <a href="https://planeta-internet.com/mifacturalegal/public/documents/upload_files"
                                           target="_blank" class="btn btn-primary btn-sm">Ir al demo</a>
                                    </p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class=" col-sm-3 col-md-3 col-lg-3  col-xl-3 d-flex">
                <div class="wow slideInRight" data-wow-delay=".8s" data-depth="0.1">
                    <br><br><br><br><br><br>
                    <img src="<?= $base_url ?>/php/img/head/<?= $data_general['logo'] ?>" alt="plant" id="" class="ml-2 d-block">
                </div>
            </div>
            <div class=" col-sm-4 col-md-4 col-lg-4  col-xl-4 d-flex">
                <br><br><br>
                <div class="slider-img-area wow slideInRight" data-wow-delay=".8s" data-depth="0.1">
                    <br>
                    <p class="text-center color-white m-0 p-0" style="color: white !important;"><b><h5 class="text-center display-4 texto-nuevo"><?= $general['title'] ?></h5></b></p>
                    <p class="text-center texto-nuevo" ><b><?= $general['description'] ?>
                    </b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container fondo-container-home" id="home-sm">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3  col-xl-3 d-flex">
                <div class="wow slideInLeft " data-wow-delay=".8s" data-depth="0.1">
                    <br><br>
                    <img id="img-logo-home" src="<?= $base_url ?>/php/img/<?= $data_general['logo'] ?>" alt="plant" id="" class="ml-2 d-block">
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4  col-xl-4 d-flex">
                <br>
                <div class="slider-img-area wow slideInRight" data-wow-delay=".8s" data-depth="0.1">
                    <br>
                    <p class="text-center color-white m-0 p-0" style="color: white !important;"><b><h5 class="text-center display-4 texto-nuevo"><?= $general['title'] ?></h5></b></p>
                    <p class="text-center texto-nuevo" ><b><?= $general['description'] ?>
                        </b></p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4  col-lg-4 col-xl-4 d-flex align-items-center text-center ">
                <div class="slider-banner-content wow slideInRight" data-wow-delay=".8s">
                    <br>
                    <div class="container">
                        <?php while($row = mysqli_fetch_assoc($detail_2)): ?>
                            <div class="col m-0 p-0">
                                <div class="card home p-0">
                                    <div class="card-body home p-0">
                                        <div class="" style="width: 85px !important; height: 85px !important;"><img
                                                    src="./php/img/home/<?= $row['img'] ?>" alt=""></div>
                                        <p class="text p-0 mt-3"><b><strong><?= $row['title'] ?></strong> </b>
                                            <br>

                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#home_<?= $row['id'] ?>">
                                                Ver detalles
                                            </button>
                                            <a href="<?= $row['link_demo'] ?>"
                                               target="_blank" class="btn btn-primary btn-sm">Ir al demo</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile ?>
                        <!-- <div class="col m-0 p-0">
                            <div class="card home p-0">
                                <div class="card-body home p-0">
                                    <div class="" style="width: 85px !important; height: 85px !important;"><img
                                                src="../../secciones/img/icono-factura.png" alt=""></div>
                                    <p class="text p-0 mt-3"><b><strong>Facturación Electrónica</strong> </b>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#facturacionElectronica">
                                            Ver detalles
                                        </button>
                                        <a href="https://planeta-internet.com/mifacturalegal/public/invoice"
                                           target="_blank" class="btn btn-primary btn-sm">Ir al demo</a>
                                    </p>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col m-0 p-0">
                            <div class="card home p-0">
                                <div class="card-body home p-0">
                                    <div class="" style="width: 85px !important; height: 85px !important;"><img
                                                src="../../secciones/img/icono-nomina.png" alt=""></div>
                                    <p class="text p-0 mt-3"><b><strong> Nómina Electrónica </strong> </b>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#nominaElectronica">
                                            Ver detalles
                                        </button>
                                        <a href="https://planeta-internet.com/mifacturalegal/public/home"
                                           target="_blank" class="btn btn-primary btn-sm">Ir al demo</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0">
                            <div class="card home p-0">
                                <div class="card-body home p-0">
                                    <div class="" style="width: 85px !important; height: 85px !important;"><img
                                                src="../../secciones/img/icono-documento.png" alt=""></div>
                                    <p class="text p-0 mt-3"><b> <strong> Documentos Soporte </strong> </b>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#documentoSoporte">
                                            Ver detalles
                                        </button>
                                        <a href="https://planeta-internet.com/mifacturalegal/public/document_support"
                                           target="_blank" class="btn btn-primary btn-sm">Ir al demo</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0">
                            <div class="card home p-0">
                                <div class="card-body home p-0">
                                    <div class="" style="width: 85px !important; height: 85px !important;"><img
                                                src="../../secciones/img/icono-recepcion.png" alt=""></div>
                                    <p class="text p-0 mt-3"><b><strong>Recepción Documentos</strong></b>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#recepcionDocumentos">
                                            Ver detalles
                                        </button>
                                        <a href="https://planeta-internet.com/mifacturalegal/public/documents/upload_files"
                                           target="_blank" class="btn btn-primary btn-sm">Ir al demo</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0">
                            <div class="card home p-0">
                                <div class="card-body home p-0">
                                    <div class="" style="width: 85px !important; height: 85px !important;"><img
                                                src="../../secciones/img/icono-soporte.png" alt=""></div>
                                    <p class="text p-0 mt-3"><b><strong>Soporte</strong></b>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#soporte">
                                            Ver detalles
                                        </button>
                                        <a href="https://planeta-internet.com/mifacturalegal/public/documents/upload_files"
                                           target="_blank" class="btn btn-primary btn-sm">Ir al demo</a>
                                    </p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->
<br><br>
</section>
