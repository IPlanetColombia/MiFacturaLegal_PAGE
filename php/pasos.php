<?php
    $conection = new Conection();
    $query_general = "SELECT * FROM pasos_general";
    $query_detail = "SELECT * FROM pasos_detail";
    $general = mysqli_fetch_array($conection->conection()->query($query_general));
    $detail = $conection->conection()->query($query_detail);
    $i = 1;
    $count = 1;
?>
<div class="container pasos">
    <div class="pasos_div">
        <div class="color">
            <h1 id="como"><?= $general['title'] ?></h1>
            <p><?= $general['description'] ?></p>
            <br>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php while($row = mysqli_fetch_assoc($detail)): ?>
                    <div class="col">
                        <div class="card h-100 col_color color<?= $i ?>">
                            <div class="img_paso img_paso_<?= $i ?>">
                                <img src="<?= $base_url ?>/php/img/pasos/<?= $row['img'] ?>" class="card-img-top" alt="...">
                            </div>
                            <!-- <div class="img_paso">
                              <img src="./assets/img/fondos/terms-1.svg" class="card-img-top" alt="...">
                            </div> -->
                            <div class="card-body">
                                <p class="card-text">
                                    <?= $row['text'] ?>
                                <!-- <ul>
                                    <li>Ingrese a <a href="#">www.mifacturalegal.com</a> y seleccione la opción registrar.</li>
                                    <li>Diligincie los datos y haga pago por PSE o transferencia bancaria.</li>
                                    <li>Recibirá un correo de confirmación de <span>soporte@mifacturalegal.com</span></li>
                                </ul> -->
                                </p>
                            </div>
                            <div class="card-footer">
                                <h1><?= $count ?>. <?= strtoupper ($row['title']) ?></h1>
                            </div>
                        </div>
                    </div>
                    <?php
                        if ($i == 3)
                            $i = 1;
                        else
                            $i++;
                        $count++;
                    ?>
                <?php endwhile ?>
                
            </div>
        </div>
    </div>
</div>
