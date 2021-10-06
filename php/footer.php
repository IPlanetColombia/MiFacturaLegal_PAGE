<?php
    $conection = new Conection();
    $query = "SELECT * FROM footer";
    $general = mysqli_fetch_array($conection->conection()->query('SELECT * FROM head'));
    $footer = mysqli_fetch_array($conection->conection()->query($query));
?>
<div class="footer">
    <div class="footer2 fondo-gradian">
        <div class="container" >
            <div class="card-body">
                <h1><?= $footer['title'] ?></h1>
                <div class="number">
                    <?php for($i = 1; $i <= 3; $i++): ?>
                        <?php if (!empty($footer['phone_'.$i])): ?>
                            <p><i class="fab fa-whatsapp"></i> +57 <?= $footer['phone_'.$i]?></p>
                        <?php endif ?>
                    <?php endfor ?>
                </div>
                <p><?= $footer['email'] ?></p>
                <p><?= $footer['direction'] ?></p>
                <div class="link">
                    <?php if (!empty($footer['sitio_web'])): ?>
                        <a href="https://<?= $footer['sitio_web'] ?>" target="_blank"><?= $footer['sitio_web'] ?></a>
                    <?php endif ?>
                </div>
            </div>

            <div class="card-body">
                <div class="redes">
                    <div class="img">
                        <img src="<?= $base_url ?>/php/img/head/<?= $general['logo'] ?>">
                        <!--
                        <div class="redes_logos">
                          <a href=""><i class="fab fa-youtube"></i></a>
                          <a href=""><i class="fab fa-facebook"></i></a>
                          <a href=""><i class="fab fa-twitter"></i></a>
                          <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
