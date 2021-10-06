<?php
    $conection = new Conection();
    $query_general = "SELECT * FROM precios_general";
    $query_detail = "SELECT * FROM precios_detail";
    $query_adicionales = "SELECT * FROM precios_adicionales";
    $query_count = "SELECT count(*) FROM precios_detail";
    $general = mysqli_fetch_array($conection->conection()->query($query_general));
    $data       = mysqli_fetch_all($conection->conection()->query($query_detail));
    $detail = $conection->conection()->query($query_detail);
    $adicionales = mysqli_fetch_array($conection->conection()->query($query_adicionales));
    $icons = ['🙂', '🤩', '🤓', '😎'];
?>
<div class="container precios">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1><?= $general['title'] ?></h1>
        <?= $general['description'] ?>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mb-1" id="precios">
        <?php foreach($data as $row): ?>
            <div class="col mb-2">
                <div class="card h-100 mb-1 rounded-3 precio">
                    <div class="card-header py-2 text-white">
                        <h4 class="my-0 fw-normal text-center"><?= $row[1] ?></h4>
                    </div>
                    <div class="card-body precio">
                        <h1 class="card-title pricing-card-title text-center">$ <?= $row[2] ?><small class="text-muted fw-light">/mes</small></h1>
                        <p>Pago anual $ <?= $row[3] ?>* <br><small><?= $row[4] ?></small></p>
                        <!-- <div class="iva">
                          <small class="text-muted iva1">Pago anual $ 180.000*</small>
                          <br>
                          <small class="text-muted iva2">*Producto exento de IVA</small>
                        </div> -->
                        <ul class="list-unstyled mt-0 mb-0 px-0">
                            <?php
                                $algo = explode('<li>',$row[5]);
                                foreach($algo as $key => $li){
                                    if($key >= 1)
                                        echo '<li>'.$icons[random_int ( 0 , count($icons)-1 )].' '.$li.'</li>';
                                }
                                
                                // $algo = implode('<li>'.$icons[random_int ( 0 , count($icons)-1 )], $algo);
                                // echo $algo;
                            ?>
                        </ul>
                    </div>
                    <div class="card-footer pago px-1 py-1">
                        <a href="<?= $row['link'] ?>" class="w-90 btn btn-lg btn-footer" target="_blank">Empecemos</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <div class="col mb-2">
            <div class="card h-100 pack mb-1 rounded-3 shadow-sm">
                <div class="card-header py-2 pack">
                    <h4 class="my-0 text-center pack_title"><?= $adicionales['title'] ?></h4>
                </div>
                <div class="card-body precio">
                    <h1 class="card-title pricing-card-title text-center text-muted pack"><?= $adicionales['sub_title'] ?></h1>
                    <ul class="list-unstyled pack mt-3 mb-0">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <?php if (!empty($adicionales['precio_'.$i])): ?>
                                <li><span class="text-muted_pack">$<?= $adicionales['precio_'.$i] ?></span> <?= $adicionales['texto_'.$i] ?></li>
                            <?php endif ?>
                        <?php endfor ?>
                        <li><span class="text-muted_pack">Integraciones</span> * preguntenos.</li>
                    </ul>
                </div>
                <?php
                ?>
                <div class="card-footer pago px-1 py-1">
                    <a href="https://api.whatsapp.com/send?phone=57<?= $adicionales['phone'] ?>&text=<?= $adicionales['mensaje'] ?>" class="w-90 btn btn-lg btn-footer" target="_blank">Empecemos</a>
                </div>
            </div>
        </div>
    </div>
</div>
