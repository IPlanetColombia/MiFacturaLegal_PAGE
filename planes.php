
<!--Pricing section start-->
<section class="pricing-sec padding-top padding-bottom" id="pricing-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 pricing-heading-area text-center">
                
                <h4 class="heading">SELECCIONE SU <span class="color">PLAN</span></h4>
               
            </div>
           <?php 
                            if(isset($_SESSION['t_exito'])){
                                echo  '<div class="alert alert-success" role="alert" style=" width:100%;"><strong>
                                '.$_SESSION['t_exito'].'</strong><button type="button" class="close fa-2x" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                                 </div>';
                                 unset($_SESSION['t_exito']);
                             }elseif(isset($_SESSION['t_pendiente'])){
                                echo  '<div class="alert alert-warning" role="alert" style="width:100%;"><strong>
                                '.$_SESSION['t_pendiente'].'</strong><button type="button" class="close fa-2x" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                                </div>';
                                unset($_SESSION['t_pendiente']);
                             }elseif(isset($_SESSION['notransaccion'])){
                                echo  '<div class="alert alert-danger" role="alert" style="width:100%;"><strong>
                                '.$_SESSION['notransaccion'].'</strong><button type="button" class="close fa-2x" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                                </div>';
                                unset($_SESSION['notransaccion']);
                             }
                            
                            ?>
        </div>
        <div class="row pricing-cards">
            <div class="col-12 col-md-6 col-lg-4 pricing-card">
                <div class="pricing-box wow fadeInUp">
                <div class="pricing-box-header position-relative">
                        <div class="pricing-header-overlay"></div>
                        <div class="header-content">
                        <h4 class="heading">Básico</h4>
                        
                            <h4 class="pricing-price">$ 15.000 <span class="sub-text">/ Mes</span></h4>                            
                            <p class="sub-text">Pago anual $ 180.000* <br><span style="font-size :10px"><b></b>*Producto exento de IVA</b></span></p>
                            
                        </div>
                    </div>
                    <div class="pricing-box-detail position-relative">
                        <div class="pricing-detail-overlay"></div>
                        <ul>                            
                            <li>🙂 100 documentos/año.</li>    							
                            <li>🤩 Incluye certificado digital.</li>
                            <li>👆 1 usuario Administrador.</li>
                            <li>👆 1 usuario facturador.</li> 
                            <li>😲 1 año de respaldo.</li>
                            <li>🥰 Acompañamiento y Soporte.</li>
                    <li><a class="btn pink-btn rounded-pill"  href="https://facturadorv2.mifacturalegal.com/solicitudes/registro" >
					Empecemos
                   
                    </a></li>							
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 pricing-card active">
                <div class="pricing-box wow fadeInUp">
                <div class="pricing-box-header position-relative">
                        <div class="pricing-header-overlay"></div>
                        <div class="header-content">
                        <h4 class="heading">Emprendedor</h4>
                        
                            <h4 class="pricing-price">$ 28.500 <span class="sub-text">/ Mes</span></h4>                            
                            <p class="sub-text">Pago anual $ 342.000* <br><span style="font-size :10px"><b></b>*Producto exento de IVA</b></span></p>
                            
                        </div>
                    </div>
                    <div class="pricing-box-detail position-relative">
                        <div class="pricing-detail-overlay"></div>
                        <ul>                            
                            <li>🙂 300 documentos/año.</li>    							
                            <li>🤩 Certificado digital.</li>
                             <li>👆 1 usuario Administrador.</li>
                            <li>👆 3 usuarios facturador.</li> 
                            <li>😲 1 año de respaldo.</li>
                            <li>🥰 Acompañamiento y Soporte.</li>
                    <li><a class="btn pink-btn rounded-pill"  href="https://facturadorv2.mifacturalegal.com/solicitudes/registro" >
					Empecemos
                   
                    </a></li>							
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 pricing-card ">
                <div class="pricing-box wow fadeInUp" data-wow-delay=".3s">
                    <div class="pricing-box-header position-relative">
                        <div class="pricing-header-overlay"></div>
                        <div class="header-content">
                        <h4 class="heading">Empresarial</h4>
                        
                            <h4 class="pricing-price">$ 39.500 <span class="sub-text">/ Mes</span></h4>                            
                            <p class="sub-text">Pago anual $ 474.000* <br><span style="font-size :10px"><b></b>*Producto exento de IVA</b></span></p>
                        </div>
                    </div>
                    <div class="pricing-box-detail position-relative">
                        <div class="pricing-detail-overlay"></div>
                        <ul>
                            
                            <li>😎 1200 documentos/año. </li>
                            <li>🤩 Certificado digital incluido.</li>
                             <li>👆 1 usuario Administrador.</li>
                            <li>🤛 5 usuarios facturador.<br></li>
                            <li>😲 1 año de respaldo de documentos.</li>  
                            <li>🥰 Acompañamiento y Soporte.</li>
							<li><a class="btn pink-btn rounded-pill"  href="https://facturadorv2.mifacturalegal.com/solicitudes/registro">
					Empecemos
                   
                    </a></li>							
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 pricing-card">
                <div class="pricing-box wow fadeInUp" data-wow-delay=".5s">
                <div class="pricing-box-header position-relative">
                        <div class="pricing-header-overlay"></div>
                        <div class="header-content">
                        <h4 class="heading">Premium</h4>
                        
                            <h4 class="pricing-price">$ 51.500 <span class="sub-text">/ Mes</span></h4>                            
                            <p class="sub-text">Pago anual $ 618.000* <br><span style="font-size :10px"><b></b>*Producto exento de IVA</b></span></p>
                        </div>
                    </div>
                    <div class="pricing-box-detail position-relative">
                        <div class="pricing-detail-overlay"></div>
                        <ul>                            
                            <li>🤓 3000 documentos/año.</li>
                            <li>🤩 Certificado digital.</li>
                             <li>👆 1 usuario Administrador.</li>
                            <li>💪 Usuarios facturador ilimitados.</li>
                            <li>😲 1 años de respaldo.</li>   
                            <li>🥰 Acompañamiento y Soporte.</li>
                    <li><a class="btn pink-btn rounded-pill"  href="https://facturadorv2.mifacturalegal.com/solicitudes/registro" >
					
					Empecemos
                   
                    </a></li>							
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 pricing-card active">
                <div class="pricing-box wow fadeInUp" data-wow-delay=".3s">
                    <div class="pricing-box-header position-relative">
                        <div class="pricing-header-overlay"></div>
                        <div class="header-content">
                        <h4 class="heading">Gold</h4>
                        
                            <h4 class="pricing-price">$ 112.500 <span class="sub-text">/ Mes</span></h4>                            
                            <p class="sub-text">Pago anual $ 1.350.000* <br><span style="font-size :10px"><b></b>*Producto exento de IVA</b></span></p>
                        </div>
                    </div>
                    <div class="pricing-box-detail position-relative">
                        <div class="pricing-detail-overlay"></div>
                        <ul>
                            
                            <li>😎 100.000 documentos/año. </li>
                            <li>🤩 Certificado digital incluido.</li>
                             <li>👆 1 usuario Administrador.</li>
                            <li>🤛Usuarios facturador ilimitados.<br></li>
                            <li>😲 1 año de respaldo de documentos.</li>  
                            <li>🥰 Acompañamiento y Soporte.</li>
							<li><a class="btn pink-btn rounded-pill"  href="https://facturadorv2.mifacturalegal.com/solicitudes/registro" >
					Empecemos
                   
                    </a></li>							
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 pricing-card">
                <div class="pricing-box wow fadeInUp" data-wow-delay=".5s">
                <div class="pricing-box-header position-relative">
                        <div class="pricing-header-overlay"></div>
                        <div class="header-content">
                        <h4 class="heading">Paquetes adicionales</h4>
                                                
                            <p class="sub-text">Solo aplica para pasar a un plan superior.</p>
                        </div>
                    </div>
                    <div class="pricing-box-detail position-relative">
                        <div class="pricing-detail-overlay"></div>
                        <ul>                            
                            <li><b>$180.000</b>. De Básico a Emprendedor.</li>
                            <li><b>$170.000</b>. Emprendedor a Empresarial.</li>
                            <li><b>$160.000</b>. De Empresarial a Premium.</li>
                            <li><b>$750.000</b>. De Premuim a Gold.</li>
                            <li><b>Integraciones </b>* preguntenos.</li>   
                            
                    <li><a class="btn pink-btn rounded-pill" target="_blank" href="https://api.whatsapp.com/send?phone=573003047277&text=Hola,%20estoy%20interesado%20en%20facturar%20eléctronicamente.">
					
					Empecemos
                   
                    </a></li>							
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Pricing section end-->
<!-- basico -->
<div class="modal fade" id="basico" tabindex="-1" role="dialog" aria-labelledby="basico" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title">Datos del cliente.</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>
                        <form action="" method="post">
                        <input type="hidden" name="suscripcion" value="si">
                        <div class="modal-body" style="overflow-y: scroll; height: 400px;">
                            <div class="container-fluid">
                               
                                <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre de la empresa" required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <input class="form-control" name="nit" id="nit" type="number" placeholder="Número de Nit o Cédula" required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        
                                        <input class="form-control" name="telefono" id="telefono" type="number"  placeholder="Teléfono"  required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                       
                                        <input class="form-control" name="correo" id="correo" type="text" placeholder="Correo de la empresa" required>
                                    </div>
                                </div>
                                <input type="hidden" name="plan" id="plan" value ="basico">
                                <input type="hidden" name="precio" id="precio" value ="180000">
                            </div>
                            <div class="modal-footer">
                                    <button class="btn btn-outline-primary" type="submit">Ir a plataforma de pagos segura.</button>
                            </div>
                        </div>
                        
                        </form>
                       
                    </div>
                </div>
            </div>
<!-- Emprendedor -->
<div class="modal fade" id="emprendedor" tabindex="-1" role="dialog" aria-labelledby="emprendedor" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title">Datos del cliente.</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>
                        <form action="" method="post">
                        <input type="hidden" name="suscripcion" value="si">
                        <div class="modal-body" style="overflow-y: scroll; height: 400px;">
                            <div class="container-fluid">
                               
                                <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre de la empresa" required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <input class="form-control" name="nit" id="nit" type="number" placeholder="Número de Nit o Cédula" required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        
                                        <input class="form-control" name="telefono" id="telefono" type="number"  placeholder="Teléfono"  required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                       
                                        <input class="form-control" name="correo" id="correo" type="text" placeholder="Correo de la empresa" required>
                                    </div>
                                </div>
                                <input type="hidden" name="plan" id="plan" value ="Emprendedor">
                                <input type="hidden" name="precio" id="precio" value ="342000">
                            </div>
                            <div class="modal-footer">
                                    <button class="btn btn-outline-primary" type="submit">Ir a plataforma de pagos segura.</button>
                            </div>
                        </div>
                        
                        </form>
                       
                    </div>
                </div>
            </div>
<!-- empresarial -->
<div class="modal fade" id="empresarial" tabindex="-1" role="dialog" aria-labelledby="empresarial" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title">Realizar Compra</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <form action="" method="post">
                        <input type="hidden" name="suscripcion" value="si">
                        <div class="modal-body" style="overflow-y: scroll; height: 400px;">
                            <div class="container-fluid">
                               
                                <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre de la empresa" required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <input class="form-control" name="nit" id="nit" type="number" placeholder="Número de Nit o Cédula" required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        
                                        <input class="form-control" name="telefono" id="telefono" type="number"  placeholder="Teléfono"  required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                       
                                        <input class="form-control" name="correo" id="correo" type="text" placeholder="Correo de la empresa" required>
                                    </div>
                                </div>
                                <input type="hidden" name="plan" id="plan" value ="Empresarial">
                                <input type="hidden" name="precio" id="precio" value ="474000">
                            </div>
                            <div class="modal-footer">
                                    <button class="btn btn-outline-primary" type="submit">Ir a plataforma de pagos segura.</button>
                            </div>
                        </div>
                        
                        </form>
                       
                    </div>
                </div>
            </div>
<!-- premium -->
<div class="modal fade" id="premium" tabindex="-1" role="dialog" aria-labelledby="premium" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title">Realizar Compra</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <form action="" method="post">
                        <input type="hidden" name="suscripcion" value="si">
                        <div class="modal-body" style="overflow-y: scroll; height: 400px;">
                            <div class="container-fluid">
                               
                                <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre de la empresa" required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <input class="form-control" name="nit" id="nit" type="number" placeholder="Número de Nit o Cédula" required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        
                                        <input class="form-control" name="telefono" id="telefono" type="number"  placeholder="Teléfono"  required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                       
                                        <input class="form-control" name="correo" id="correo" type="text" placeholder="Correo de la empresa" required>
                                    </div>
                                </div>
                                <input type="hidden" name="plan" id="plan" value ="Premium">
                                <input type="hidden" name="precio" id="precio" value ="618000">
                        </div>
                        <div class="modal-footer">
                                    <button class="btn btn-outline-primary" type="submit">Ir a plataforma de pagos segura.</button>
                            </div>

                            </div>
                        
                        </form>
                       
                    </div>
                </div>
            </div>
<!-- gold -->
<div class="modal fade" id="gold" tabindex="-1" role="dialog" aria-labelledby="gold" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title">Datos del cliente.</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>
                        <form action="" method="post">
                        <input type="hidden" name="suscripcion" value="si">
                        <div class="modal-body" style="overflow-y: scroll; height: 400px;">
                            <div class="container-fluid">
                               
                                <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre de la empresa" required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <input class="form-control" name="nit" id="nit" type="number" placeholder="Número de Nit o Cédula" required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        
                                        <input class="form-control" name="telefono" id="telefono" type="number"  placeholder="Teléfono"  required>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                       
                                        <input class="form-control" name="correo" id="correo" type="text" placeholder="Correo de la empresa" required>
                                    </div>
                                </div>
                                <input type="hidden" name="plan" id="plan" value ="gold">
                                <input type="hidden" name="precio" id="precio" value ="1350000">
                            </div>
                            <div class="modal-footer">
                                    <button class="btn btn-outline-primary" type="submit">Ir a plataforma de pagos segura.</button>
                            </div>
                        </div>
                        
                        </form>
                       
                    </div>
                </div>
            </div>


    <?php 
    if(isset($_POST['plan'])){
        ?>
        <div class="hidden">
            <form>
            <script src='https://checkout.epayco.co/checkout.js' 
                data-epayco-key='3e68b295e5d6460972ba880ca1f8a967' 
                class='epayco-button' 
                data-epayco-extra1 = '<?= $_POST["nombre"]; ?>'
                data-epayco-extra2 = '<?= $_POST["correo"]; ?>'
                data-epayco-extra3 = '<?= $_POST["nit"]; ?>'
                data-epayco-extra4 = '<?= $_POST["telefono"]; ?>'
                data-epayco-amount='<?= $_POST["precio"]; ?>' 
                data-epayco-tax='0'
                data-epayco-tax-base='<?= $_POST["precio"]; ?>'
                data-epayco-name='<?= $_POST["plan"]; ?>' 
                data-epayco-description='<?= $_POST["plan"]; ?>' 
                data-epayco-currency='COP'    
                data-epayco-country='CO' 
                data-epayco-test='false' 
                data-epayco-external='true' 
                data-epayco-autoclick = 'true'
                data-epayco-response='https://mifacturalegal.com/respuesta.php'  
                data-epayco-confirmation='https://mifacturalegal.com/confirmar.php' 
                data-epayco-button='https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/boton_carro_de_compras_epayco2.png'> 
            </script> 
        </form>
        </div>
        
        <?php
    }
    ?>

    

