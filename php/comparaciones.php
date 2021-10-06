<?php
    $conection = new Conection();
    $query_precios = "SELECT title, precio_mes, precio_anual FROM precios_detail";
    $query_tablas = "SELECT * FROM comparaciones";
    $precios = mysqli_fetch_all($conection->conection()->query($query_precios));
    $count = mysqli_num_rows($conection->conection()->query($query_precios));
    $tablas = $conection->conection()->query($query_tablas);
?>
<div class="container comparar mt-3">
    <div>
        <h3 class="h3_titulo" id="comparaciones">Comparaciones</h3>
        <table class="table">
            <thead class="table-blue">
            <tr>
                <th scope="col"></th>
                <?php foreach($precios as $row): ?>
                    <th scope="col"><?= $row[0] ?></th>
                <?php endforeach ?>
                <!-- <th scope="col">Emprendedor</th>
                <th scope="col">Empresarial</th>
                <th scope="col">Premium</th>
                <th scope="col">Gold</th> -->
            </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($tablas)): ?>
                <tr>
                    <th scope="row"><?= $row['title'] ?></th>
                    <?php for($i = 1; $i <= $count; $i++): ?>
                        <?php
                            if($row['precio_'.$i] === 'check' || $row['precio_'.$i] === 'close')
                                $td = '<i class="far fa-'.$row['precio_'.$i].'-circle"></i>';
                            else
                                $td = $row['precio_'.$i];
                        ?>
                        <td><?= $td ?></td>
                    <?php endfor ?>
                    <!-- <td>300</td>
                    <td>1.200</td>
                    <td>3.000</td>
                    <td>10.000</td> -->
                </tr>
            <?php endwhile ?>
            <tr>
                <th scope="row">Pago mensual</th>
                <?php foreach($precios as $row): ?>
                    <td>$ <?= $row[1] ?></td>
                <?php endforeach ?>
            </tr>
            <tr>
                <th scope="row">Pago anual</th>
                <?php foreach($precios as $row): ?>
                    <td>$ <?= $row[2] ?></td>
                <?php endforeach ?>
            </tr>
            <!--
            <tr>
                <th scope="row">Multiples resoluciones de facturación</th>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
            </tr>
            <tr>
                <th scope="row">Multimoneda (COP, USD, EUR)</th>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
            </tr>
            <tr>
                <th scope="row">Módulo de carteraOnline</th>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
            </tr>
            <tr>
                <th scope="row">Módulo de cotizaciones</th>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
            </tr>
            <tr>
                <th scope="row">Indicadores de gestiíon</th>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
            </tr>
            <tr>
                <th scope="row">Módulo de informes contables</th>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
                <td><i class="far fa-check-circle"></i></td>
            </tr>
            <tr>
                <th scope="row">Usuario administrador</th>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <th scope="row">Usuario facturador</th>
                <td>1</td>
                <td>3</td>
                <td>5</td>
                <td>Ilimitado</td>
                <td>Ilimitado</td>
            </tr>
            <tr>
                <th scope="row">Tiempo de respaldo</th>
                <td>1 año</td>
                <td>1 año</td>
                <td>1 año</td>
                <td>1 año</td>
                <td>1 año</td>
            </tr>
            <tr>
                <th scope="row"> Acompañamiento y soporte</th>
                <td>Incluido</td>
                <td>Incluido</td>
                <td>Incluido</td>
                <td>Incluido</td>
                <td>Incluido</td>
            </tr>
            <tr>
                <th scope="row">Precio mes</th>
                <td>$15.000</td>
                <td>$28.500</td>
                <td>$39.500</td>
                <td>$51.500</td>
                <td>$112.500</td>
            </tr>
            <tr>
                <th scope="row">Pago anual</th>
                <td>$180.000</td>
                <td>$342.000</td>
                <td>$474.000</td>
                <td>$618.000</td>
                <td>$1.350.000</td>
            </tr> -->
            </tbody>
        </table>
    </div>
</div>
