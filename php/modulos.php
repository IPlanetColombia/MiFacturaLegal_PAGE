<?php
    $conection = new Conection();
    $query_general = 'SELECT * FROM modulos_general';
    $query_detail = 'SELECT * FROM modulos_detail';
    $query_why = 'SELECT * FROM why';
    $general = mysqli_fetch_array($conection->conection()->query($query_general));
    $detail = $conection->conection()->query($query_detail);
    $why = $conection->conection()->query($query_why);
?>
<hr>
<div class="container">
    <h3 class="h3_titulo"  id="modulos"><b><?= $general['title_1'] ?><br><?= $general['description_1'] ?></b></h3>
    <div class="plans">
        <?php while($row = mysqli_fetch_assoc($detail)): ?>
            <div class="plan purple">
                <h3><?= $row['title'] ?></h3>
                <p><?= $row['description'] ?></p>
                <div class="plan_footer">
                    <a href="<?= $row['link'] ?>" target="_blank">Ir al demo</a>
                </div>
            </div>
        <?php endwhile ?>
        <!-- <div class="plan purple">
            <h3>Cotizaciones</h3>
            <p>Cotizaciones y facturas recurrentes.</p>
            <div class="plan_footer">
                <a href="https://planeta-internet.com/mifacturalegal/public/quotation" target="_blank">Ir al demo</a>
            </div>
        </div>
        <div class="plan purple">
            <h3>Reportes por</h3>
            <p>Ventas, productos, impuestos, cartera.</p>
            <div class="plan_footer">
                <a href="https://planeta-internet.com/mifacturalegal/public/report_general" target="_blank">Ir al demo</a>
            </div>
        </div>
        <div class="plan purple">
            <h3>Sistema POS</h3>
            <p>Complemento de sistemas POS.</p>
            <div class="plan_footer">
                <a href="https://planeta-internet.com/mifacturalegal/public/post/create" target="_blank">Ir al demo</a>
            </div>
        </div>
        <div class="plan purple">
            <h3>Indicadores</h3>
            <p>Gerenciales enviados al correo electrónico.</p>
            <div class="plan_footer">
                <a href="https://planeta-internet.com/mifacturalegal/public/home" target="_blank">Ir al demo</a>
            </div>
        </div> -->
    </div>
    <div class="azul">
        <div class="azul2">
            <h1 id="why"><?= $general['title_2'] ?></h1>
            <p><b><?= $general['description_2'] ?></b></p>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php while($row = mysqli_fetch_assoc($why)): ?>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="icon_base">
                                    <div class="icon2">
                                        <i class="material-icons"><?= $row['icon'] ?></i>
                                    </div>
                                </div>
                                <div class="card-text2">
                                    <h5><?= $row['title'] ?></h5>
                                    <?php
                                        $explode = explode('<li>', $row['text']);
                                        $list = implode('<li><i class="fas fa-check"></i> ', $explode);
                                    ?>
                                    <?= $list ?>
                                    <!-- <ul>
                                        <li>
                                            <i class="fas fa-check"></i> Con validación previa de la DIAN.
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i> Expedición de formatos XML y PDF.
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i> Certificado de Firma digital.
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i> Incluye código QR y CUFE de seguridad.
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i> Manejo de múltiples resoluciones de facturación para un mismo NIT.
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i> Manejo de Factura de venta nacional, de exportación, notas crédito y notas débito.
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i> 2 roles de usuario: Administrador y facturador.
                                        </li>
                                    </ul> -->
                                </div>
                            </div>
                            <div class="card-footer"><a href="https://api.whatsapp.com/send?phone=57<?= $row['phone'] ?>&text=<?= str_replace(['<p>','</p>'],'', $row['mensaje']); ?>" target="_blank" >Contáctanos</a></div>
                        </div>
                    </div>
                <?php endwhile ?>
                <!-- <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="icon_base">
                                <div class="icon2">
                                    <i class="fas fa-laptop"></i>
                                </div>
                            </div>
                            <div class="card-text2">
                                <h5>Potencia tus facturas</h5>
                                <ul>
                                    <li>
                                        <i class="fas fa-check"></i> Incluye el logo de la empresa.
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Envío hasta a 3 correos electrónicos.
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Confirmación de leído por el cliente.
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Estados en tiempo real. (Guardado, Validado por la DIAN, Enviado a cliente, recibido).
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Manejo de multimoneda (COP, USD, EUR) .
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer"><a href="https://api.whatsapp.com/send?phone=573142957896&text=Hola,%20estoy%20interesado%20en%20contratar." target="_blank" >Contáctanos</a></div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="icon_base">
                                <div class="icon2">
                                    <i class="far fa-comment-dots"></i>
                                </div>
                            </div>
                            <div class="card-text2">
                                <h5>Módulos Extra</h5>
                                <ul>
                                    <li>
                                        <i class="fas fa-check"></i> Cartera y métodos de recaudo.
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Cotizaciones y facturas recurrentes.
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Documentos soporte para operaciones con no obligados a facturar.
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Recepción de documentos electrónicos (factura de proveedores).
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Cuentas contables.
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Importe de archivos (Clientes, productos y cuentas contables).
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Informes de ventas e impuestos.
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Panel de reportes: ventas generales, por producto, impuestos, cartera, cotizaciones.
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Envio de indicadores gerenciales automaticos al correo electónicos.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer"><a href="https://api.whatsapp.com/send?phone=573142957896&text=Hola,%20estoy%20interesado%20en%20contratar." target="_blank" >Contáctanos</a></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
