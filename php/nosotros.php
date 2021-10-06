<?php
    $conection = new Conection();
    $query_general = "SELECT * FROM nosotros";
    $query_img = "SELECT * FROM img_nosotros";
    $general = mysqli_fetch_array($conection->conection()->query($query_general));
    $img = $conection->conection()->query($query_img);
?>
<div class="container" id="nosotros">
    <div class="black">
        <div class="black2">
            <div class="row row-cols-md-2">
                <div class="col-ms-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5><?= $general['title'] ?></h5>
                            <b><?= $general['sub_title'] ?></b>
                            <?= $general['text'] ?>
                        </div>
                        <div class="card-footer"><a href="https://api.whatsapp.com/send?phone=57<?= $general['phone'] ?>&text=<?= $general['mensaje'] ?>" target="_blank" >Contáctanos</a></div>
                    </div>
                </div>
                <div class="col-ms-7">
                    <div class="card h-100">
                        <div id="footerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php $i = 1 ?>
                                <?php while($row = mysqli_fetch_assoc($img)): ?>
                                    <div class="carousel-item <?= $i == 1 ?'active':''?>">
                                        <div class="carousel-img">
                                            <img src="<?= $base_url ?>/php/img/nosotros/<?= $row['img'] ?>">
                                        </div>
                                    </div>
                                <?php $i++ ?>
                                <?php endwhile ?>
                                <!-- <div class="carousel-item">
                                    <div class="carousel-img">
                                        <img src="./assets/img/carusel/factura.jpg">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-img">
                                        <img src="./assets/img/carusel/factura2.jpg">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-img">
                                        <img src="./assets/img/carusel/cotizador.jpg">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-img">
                                        <img src="./assets/img/carusel/cartera.jpg">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-img">
                                        <img src="./assets/img/carusel/productos.jpg">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-img">
                                        <img src="./assets/img/carusel/clientes.jpg">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-img">
                                        <img src="./assets/img/carusel/informe.jpg">
                                    </div>
                                </div> -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#footerCarousel"  data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#footerCarousel"  data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
