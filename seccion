<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  
  <link rel="shortcut icon" type="image/x-icon" href="./assets/img/favicon/32x32.png">
  <link rel="stylesheet" href="https://mischats.com/supportboard/media/icons/png/style.css">


  <!-- Author -->
  <meta name="author" content="Iplanet Colombia SAS">
  <!-- description -->
  <meta name="description" content="Potencie su negocio; todos los planes incluyen certificado digital, los módulos de emisión y recepción de facturas, documento soporte y nómina electrónica. Tambien se incluye cartera Online y cotizaciones.">
  <!-- keywords -->
  <meta name="keywords" content="Factura, Factura electrónica, documento soporte, nómina electrónica, DIAN, certificado digital">
  <!-- Page Title -->
  <title>MiFacturaLegal.com - Factura y Nómina Electrónica</title>

  <!-- CSS  -->
  <link href="./assets/css/myStyle.css" type="text/css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!-- SCRIPT -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
</head>
<body>
<?php 
                             if(isset($_GET['success'])){
                                echo  '<div class="alert alert-success" role="alert" style="position:absolute; width:100%;z-index:1000;"><strong>
                                Transaccíon Exitosa!!!. Sus datos fueron enviados, recibirá un correo con la documentación necesaria. Gracias.</strong><button type="button" class="close fa-2x" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                                 </div>';
                                // unset($_SESSION['correo']);
                             }elseif(isset($_SESSION['error'])){
                                echo  '<div class="alert alert-warning" role="alert" style="position:absolute; width:100%; z-index:1000;"><strong>
                                No se Puede realizar la el Pago.</strong><button type="button" class="close fa-2x" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                                </div>';
                                unset($_SESSION['error']);
                             }
                            
                            ?>

  <div class="encabezado" id="encabezado">
    <nav class="navbar navbar-expand-lg navbar-dark" >
      <div class="container-fluid" >
        <a class="navbar-brand" href="#"><img src="./assets/img/favicon/32x32.png">MiFacturaLegal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-text">
        <div class="collapse navbar-collapse " id="navbarSupportedContent" >
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!--<li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#modulos">Módulos extras</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#why">Caracteristicas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#precios">Precios</a>
            </li>
           <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#comparaciones">Comparaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#como">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#nosotros">Nosotros</a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link active auth" aria-current="page" href="https://facturadorv2.mifacturalegal.com/solicitudes/registro">Comprar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active auth" aria-current="page" href="https://facturadorv2.mifacturalegal.com/"><i class="fa fa-user"></i> Ingresar</a>
            </li>
          </ul>
   
    </span>
        </div>
      </div>
    </nav>
  </div>
  <div class="purple" id="home">
    <div class="section">
      <div class="logo_title">
        <div class="logo">
          <img src="./assets/img/logo/logo-mifacturalegal.png">
        </div>
        <div class="title">
          <p>Software de Facturación y N&oacute;mina Electrónica:<br><b>MiFacturaLegal.com</b></p>
        </div>
      </div>
    </div>
    <div class="container" >

      <div class="section">
        <div class="logo_title">
          
          <div class="title">
            <p><b>Principales módulos</b></p>
          </div>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-2 g-2">
        
        <div class="col">
          <div class="card home">
            <div class="card-body home">
              <div class="icon"><i class="fas fa-file-invoice-dollar"></i></div>
              <p class="text"><b> Facturación Electrónica </b>
                <br><br>                
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#facturacionElectronica">
                  Ver detalles
                </button>
                <a href="https://planeta-internet.com/mifacturalegal/public/invoice" target="_blank" class="btn btn-primary">Ir al demo</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card home">
            <div class="card-body home">
              <div class="icon"><i class="fas fa-id-badge"></i></div>
              <p class="text"><b> Nómina Electrónica </b>
              <br><br> 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nominaElectronica">
                  Ver detalles
                </button>          
                <a href="https://planeta-internet.com/mifacturalegal/public/home" target="_blank" class="btn btn-primary">Ir al demo</a>
               </p>
            </div>
          </div>
        </div>
        
        <div class="col">
          <div class="card home">
            <div class="card-body home">
              <div class="icon"><i class="fas fa-file-contract"></i></div>
              <p class="text"><b> Documentos Soporte </b>
                <br><br>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#documentoSoporte">
                  Ver detalles
                </button>
                <a href="https://planeta-internet.com/mifacturalegal/public/document_support" target="_blank" class="btn btn-primary">Ir al demo</a>
               </p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card home">
            <div class="card-body home">
              <div class="icon"><i class="fas fa-file-import"></i></div>
              <p class="text"><b>Recepción Documentos</b>
                <br><br>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#recepcionDocumentos">
                  Ver detalles
                </button>      
                <a href="https://planeta-internet.com/mifacturalegal/public/documents/upload_files" target="_blank" class="btn btn-primary">Ir al demo</a>
               </p>
            </div>
          </div>
        </div>

      
       
      </div>
      <div class="col">
          <div class="card home">
            <div class="card-body home">
              <div class="icon"><i class="fas fa-user-cog"></i></div>
              <p class="text"><b>Soporte</b>
                <br><br>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#soporte">
                  Ver detalles
                </button>      
                <a href="https://planeta-internet.com/mifacturalegal/public/documents/upload_files" target="_blank" class="btn btn-primary">Ir al demo</a>
               </p>
            </div>
          </div>
        </div>

    </div>


      <!-- 
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="carousel-img">
              <img src="./assets/img/carusel/home.jpg">
            </div>
          </div>
          <div class="carousel-item">
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
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
   
    </div> -->
  </div>
<hr>
  <div class="container pasos">
    <div class="pasos_div">
      <div class="color">
        <h1 id="como">Como adquirir el servicio</h1><br>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card h-100 col_color color1">
              <div class="img_paso img_paso_1">
                <div class=" color color_1">
                </div>
              </div>
              <!-- <div class="img_paso">
                <img src="./assets/img/fondos/terms-1.svg" class="card-img-top" alt="...">
              </div> -->
              <div class="card-body">
                <p class="card-text">
                  <ul>
                    <li>Ingrese a <a href="#">www.mifacturalegal.com</a> y seleccione la opción registrar.</li>
                    <li>Diligincie los datos y haga pago por PSE o transferencia bancaria.</li>
                    <li>Recibirá un correo de confirmación de <span>soporte@mifacturalegal.com</span></li>
                  </ul>
                </p>
              </div>
              <div class="card-footer">
                <h1>1. REGISTRO</h1>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 col_color color2">
              <div class="img_paso img_paso_2">
                <div class=" color color_2">
                </div>
              </div>
              <!-- <div class="img_paso">
                <img src="./assets/img/fondos/terms-2.svg" class="card-img-top" alt="...">
              </div> -->
              <div class="card-body">
                <p class="card-text">
                  Ingresar al enlace recibo en el correo electrónico y cargue la siguiente info:
                  <ul>
                    <li>RUT.</li>
                    <li>Cámara de comercio.</li>
                    <li>Cedula representante legal.</li>
                    <li>Contrato de suscripción y autorización de solicitud (Adjuntos en el correo).</li>
                    <li>Resolución de facturación electrónica.</li>
                  </ul>
                </p>
              </div>
              <div class="card-footer">
                <h1>2. ENVIO DE INFORMACIÓN</h1>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 col_color color3">
              <div class="img_paso img_paso_3">
                <div class=" color color_3">
                </div>
              </div>
              <!-- <div class="img_paso">
                <img src="./assets/img/fondos/illustration-4.png" class="card-img-top" alt="...">
              </div> -->
              <div class="card-body">
                <p class="card-text" style="text-align:center">
                    <br>
                    <br>
                  <b>Recibir el correo con las credenciales de acceso al sistema.</b>
                  <br> <br>
                  <b>Y ya esta listo para facturar electrónicamente</b>
                </p>
              </div>
              <div class="card-footer">
                <h1>3. LISTO</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>
  <div class="container">
    <h3 class="h3_titulo"  id="modulos"><b>Módulos extras <br>(incluido en todas las suscripciones):</b></h3>
    <div class="plans">
      <div class="plan purple">
        <h3>Cartera Online</h3>
        <p>Seguimiento a cartera y métodos de recaudo.</p>
        <div class="plan_footer">
          <a href="https://planeta-internet.com/mifacturalegal/public/wallet/index" target="_blank">Ir al demo</a>
        </div>
      </div>
      <div class="plan purple">
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
      </div>
    </div>
    <div class="azul">
      <div class="azul2">
        <h1 id="why">¿Por qué elegir MiFacturaLegal?</h1>
        <p><b>Creemos en que hacer tus documentos electroicos debe ser facil y nuestra misión es que asi sea.</b></p>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card h-100">
              <div class="card-body">
                <div class="icon_base">
                  <div class="icon2">
                    <i class="fas fa-globe"></i>
                  </div>
                </div>
                <div class="card-text2">
                  <h5>Validación</h5>
                  <ul>
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
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container precios">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1>Precios</h1>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mb-1" id="precios">
      <div class="col mb-2">
        <div class="card h-100 mb-1 rounded-3 precio">
          <div class="card-header py-2 text-white">
            <h4 class="my-0 fw-normal text-center">Básico</h4>
          </div>
          <div class="card-body precio">
            <h1 class="card-title pricing-card-title text-center">$15.000<small class="text-muted fw-light">/mes</small></h1>
            <p>Pago anual $ 180.000* <br><small>*Producto exento de IVA</small></p>
            <!-- <div class="iva">
              <small class="text-muted iva1">Pago anual $ 180.000*</small>
              <br>
              <small class="text-muted iva2">*Producto exento de IVA</small>
            </div> -->
            <ul class="list-unstyled mt-0 mb-0 px-0">
              <li>🙂</i> 100 documentos/año</li>
              <li>🤩 Certificado digital</li>              
            </ul>
          </div>
          <div class="card-footer pago px-1 py-1">
            <a href="https://facturadorv2.mifacturalegal.com/solicitudes/registro" class="w-90 btn btn-lg btn-footer" target="_blank">Empecemos</a>
          </div>
        </div>
      </div>
      <div class="col mb-2">
        <div class="card h-100 mb-1 rounded-3 precio">
          <div class="card-header py-2 text-white">
            <h4 class="my-0 fw-normal text-center">Emprendedor</h4>
          </div>
          <div class="card-body precio">
            <h1 class="card-title pricing-card-title text-center ">$28.500<small class="text-muted fw-light">/mes</small></h1>
            <p>Pago anual $ 342.000* <br><small>*Producto exento de IVA</small></p>
            <!-- <div class="iva">
              <small class="text-muted iva1">Pago anual $ 180.000*</small>
              <br>
              <small class="text-muted iva2">*Producto exento de IVA</small>
            </div> -->
            <ul class="list-unstyled mt-0 mb-0 px-0">
              <li>🙂</i> 300 documentos/año</li>
              <li>🤩 Certificado digital</li>              
            </ul>
          </div>
          <div class="card-footer pago px-1 py-1">
            <a href="https://facturadorv2.mifacturalegal.com/solicitudes/registro" class="w-90 btn btn-lg btn-footer" target="_blank">Empecemos</a>
          </div>
        </div>
      </div>
      <div class="col mb-2">
        <div class="card h-100 mb-1 rounded-3 precio">
          <div class="card-header py-2 text-white">
            <h4 class="my-0 fw-normal text-center">Empresarial</h4>
          </div>
          <div class="card-body precio">
            <h1 class="card-title pricing-card-title text-center ">$39.500<small class="text-muted fw-light">/mes</small></h1>
            <p>Pago anual $ 474.000* <br><small>*Producto exento de IVA</small></p>
            <!-- <div class="iva">
              <small class="text-muted iva1">Pago anual $ 180.000*</small>
              <br>
              <small class="text-muted iva2">*Producto exento de IVA</small>
            </div> -->
            <ul class="list-unstyled mt-0 mb-0 px-0">
              <li>😎</i> 1.200 documentos/año</li>
              <li>🤩 Certificado digital</li>              
            </ul>
          </div>
          <div class="card-footer pago px-1 py-1">
            <a href="https://facturadorv2.mifacturalegal.com/solicitudes/registro" class="w-90 btn btn-lg btn-footer" target="_blank">Empecemos</a>
          </div>
        </div>
      </div>
      <div class="col mb-2">
        <div class="card h-100 mb-1 rounded-3 precio">
          <div class="card-header py-2 text-white">
            <h4 class="my-0 fw-normal text-center">Premium</h4>
          </div>
          <div class="card-body precio">
            <h1 class="card-title pricing-card-title text-center ">$51.500<small class="text-muted fw-light">/mes</small></h1>
            <p>Pago anual $ 618.000* <br><small>*Producto exento de IVA</small></p>
            <!-- <div class="iva">
              <small class="text-muted iva1">Pago anual $ 180.000*</small>
              <br>
              <small class="text-muted iva2">*Producto exento de IVA</small>
            </div> -->
            <ul class="list-unstyled mt-0 mb-0 px-0">
              <li>🤓</i> 3.000 documentos/año</li>
              <li>🤩 Certificado digital</li>              
            </ul>
          </div>
          <div class="card-footer pago px-1 py-1">
            <a href="https://facturadorv2.mifacturalegal.com/solicitudes/registro" class="w-90 btn btn-lg btn-footer" target="_blank">Empecemos</a>
          </div>
        </div>
      </div>
      <div class="col mb-2">
        <div class="card h-100 mb-1 rounded-3 precio">
          <div class="card-header py-2 text-white">
            <h4 class="my-0 fw-normal text-center">Gold</h4>
          </div>
          <div class="card-body precio">
            <h1 class="card-title pricing-card-title text-center ">$81.700<small class="text-muted fw-light">/mes</small></h1>
            <p>Pago anual $ 980.000* <br><small>*Producto exento de IVA</small></p>
            <!-- <div class="iva">
              <small class="text-muted iva1">Pago anual $ 180.000*</small>
              <br>
              <small class="text-muted iva2">*Producto exento de IVA</small>
            </div> -->
            <ul class="list-unstyled mt-0 mb-0 px-0">
              <li>🤓</i> 10.000 documentos/año</li>
              <li>🤩 Certificado digital</li>              
            </ul>
          </div>
          <div class="card-footer pago px-1 py-1">
            <a href="https://facturadorv2.mifacturalegal.com/solicitudes/registro" class="w-90 btn btn-lg btn-footer" target="_blank">Empecemos</a>
          </div>
        </div>
      </div>

      <div class="col mb-2">
        <div class="card h-100 pack mb-1 rounded-3 shadow-sm">
          <div class="card-header py-2 pack">
            <h4 class="my-0 text-center pack_title">Paquetes adicionales</h4>
          </div>
          <div class="card-body precio">
            <h1 class="card-title pricing-card-title text-center text-muted pack">Solo aplica para pasar a un plan superior.</h1>
            <ul class="list-unstyled pack mt-3 mb-0">
              <li><span class="text-muted_pack">$180.000.</span> De Básico a Emprendor</li>
              <li><span class="text-muted_pack">$170.000.</span> Emprendedor a Empresarial.</li>
              <li><span class="text-muted_pack">$160.000.</span> De Empresarial a Premium.</li>
              <li><span class="text-muted_pack">$362.000.</span> De Premuim a Gold.</li>
              <li><span class="text-muted_pack">Integraciones</span> * preguntenos.</li>
            </ul>
          </div>
          <div class="card-footer pago px-1 py-1">
            <a href="https://api.whatsapp.com/send?phone=573003047277&text=Hola,%20estoy%20interesado%20en%20facturar%20eléctronicamente." class="w-90 btn btn-lg btn-footer" target="_blank">Empecemos</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container comparar mt-3">
    <div>
      <h3 class="h3_titulo" id="comparaciones">Comparaciones</h3>
      <table class="table">
        <thead class="table-blue">
          <tr>
            <th scope="col"></th>
            <th scope="col">Básico</th>
            <th scope="col">Emprendedor</th>
            <th scope="col">Empresarial</th>
            <th scope="col">Premium</th>
            <th scope="col">Gold</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Documentos/año</th>
            <td>100</td>
            <td>300</td>
            <td>1.200</td>
            <td>3.000</td>
            <td>10.000</td>
          </tr>
          <tr>
            <th scope="row">Certificado digital</th>
            <td><i class="far fa-check-circle"></i></td>
            <td><i class="far fa-check-circle"></i></td>
            <td><i class="far fa-check-circle"></i></td>
            <td><i class="far fa-check-circle"></i></td>
            <td><i class="far fa-check-circle"></i></td>
          </tr>
          <tr>
            <th scope="row">Logo de la empresa</th>
            <td><i class="far fa-check-circle"></i></td>
            <td><i class="far fa-check-circle"></i></td>
            <td><i class="far fa-check-circle"></i></td>
            <td><i class="far fa-check-circle"></i></td>
            <td><i class="far fa-check-circle"></i></td>
          </tr>
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
          </tr>
        </tbody>
      </table>
    </div>
  </div>


 


  <div class="container" id="nosotros">
    <div class="black">
      <div class="black2">
        <div class="row row-cols-md-2">
          <div class="col-ms-5">
            <div class="card h-100">
              <div class="card-body">
                <h5>Conoce más sobre nosotros</h5>
                <b>Características</b>
                <ul>
                  <li>Formato: Digital</li>
                  <li>Autor: IPlanet Colombia SAS</li>
                  <li>Tipo de Software: Facturación y Nómina electrónica</li>
                  <li>Duración: 1 año</li>
                </ul>
              </div>              
              <div class="card-footer"><a href="https://api.whatsapp.com/send?phone=573142957896&text=Hola,%20estoy%20interesado%20en%20contratar." target="_blank" >Contáctanos</a></div>

            </div>
          </div>
          <div class="col-ms-7">
            <div class="card h-100">
              <div id="footerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="carousel-img">
                      <img src="./assets/img/carusel/home.jpg">
                    </div>
                  </div>
                  <div class="carousel-item">
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
                  </div>
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
 
  <div class="footer">
    <div class="footer2">
      <div class="container">
        <div class="card-body">
          <h1>Contacto</h1>
          <div class="number">
            <p>+57 314 295 78 96</p>
            <p>+57 301 769 74 98</p>
            <p>+57 300 304 72 77</p>
          </div>
          <p>soporte@mifacturalegal.com</p>
          <p>Bogotá - Colombia - Sur América</p>
          <div class="link">
            <a href="https://www.mifacturalegal.com/" target="_blank">www.MiFacturaLegal.com</a>
          </div>
        </div>
    
        <div class="card-body">
          <div class="redes">
            <div class="img">
              <img src="./assets/img/logo/logo-mifacturalegal.png">
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
<!--

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Contact Us</h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="background3.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>
-->

<!-- Modal Facturacion electronica -->
<div class="modal fade" id="facturacionElectronica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Facturación electrónica</h5>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Caracteristicas
        <ul>
          <li>
            <i class="fas fa-check"></i> Con validación previa de la DIAN.
          </li>
          <li>
            <i class="fas fa-check"></i> Expedición de formatos XML y representación gráfica en PDF.
          </li>
          <li>
            <i class="fas fa-check"></i> Certificado de Firma digital.
          </li>
          <li>
            <i class="fas fa-check"></i> QR y CUFE de seguridad.
          </li>
          <li>
            <i class="fas fa-check"></i> Transmisión a la Dian y al adquirente.
          </li>
          <li>
            <i class="fas fa-check"></i> Manejo de múltiples resoluciones de facturación.
          </li>
          <li>
            <i class="fas fa-check"></i> Factura de venta nacional, notas crédito y notas débito.
          </li>
          <li>
            <i class="fas fa-check"></i> Manejo de multimoneda (COP, USD, EUR).
          </li>
          <li>
            <i class="fas fa-check"></i> Confirmación de leído por el adquirente.
          </li>
          <li>
            <i class="fas fa-check"></i> Envío hasta a 3 correos electrónicos del adquirente.
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Recepcion documento -->
<div class="modal fade" id="recepcionDocumentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recepción Documentos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>Valida emisor y receptor, además podras: </p>
        <ul>
          <li>
            <i class="fas fa-check"></i> Gestiona y organiza todo en un mismo lugar.
          </li>
          <li>
            <i class="fas fa-check"></i> Ideal para organizar tu contabilidad.
          </li>
          <li>
            <i class="fas fa-check"></i> Con validación automática del código QR y CUFE ante la plataforma DIAN
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Documentos soporte -->
<div class="modal fade" id="documentoSoporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Documentos Soporte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <P>Documento soporte en adquisiciones efectuadas a no obligados a facturar. El servicio cuenta con 2 modalidades así:
</p>
        <ul>
          <li>
            <i class="fas fa-check"></i> Proveedor recurrente.
          </li>
          <li>
            <i class="fas fa-check"></i> Proveedor NO recurrente.
          </li>
        </ul>
        <p>El servicio incluye la transmisión a la Dian cuando lo solicite y habilite el mecanismo de transmisión electrónico.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Nomina eletronica -->
<div class="modal fade" id="nominaElectronica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nómina electrónica</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>Comprende la generación y transmisión a la Dian del Documento <b>Soporte de Pago de Nómina Electrónica</b> a través de:</p>
        <ul>
          <li>
          <i class="fas fa-people-carry"></i> Carga de archivos en Excel al portal web de MiFacturaLegal, ó
          </li>
          <li>
           <i class="fas fa-hiking"></i> &nbsp;&nbsp;Integración al software de nómina de si este software así lo permite.
          </li>
        </ul>
        <p>El alcance incluye un portal web para todos los empleados de su empresa en el cual los empleados.</p>
        <ul>
          <li>
          <i class="fas fa-child"></i>	Podrán descargar sus desprendibles de pago de nomina.
          </li>
          <li>
          <i class="fas fa-child"></i>	Descargar certificados laborales preestablecidos.
          </li>
          <li>
          <i class="fas fa-child"></i>	Descargar certificados de ingresos y retenciones.
          </li>
        </ul>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal sporte -->
<div class="modal fade" id="soporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Soporte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>El servicio incluye soporte mediante los siguientes canales de atención:</p>
        <ul>
          <li>
          <i class="fas fa-people-carry"></i> <b>PLATAFORMA WEB:</b> Chat mediante la plataforma de MiFacturaLegal. Horario de atención: 7x24. 
          </li>
          <li>
           <i class="fas fa-hiking"></i> &nbsp;&nbsp;<b>WhatsApp:</b> Chat directo con el equipo de soporte. Horario de atención: de lunes a viernes 8:00 a.m. a 6:00 p .m . y sábados 8:00 a.m. a 1:00 p.m
          </li>
        </ul>
        <p>En caso de requerir un Servicio Premium, La Empresa deberá solicitar la cotización.</p>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
  <!--  Scripts-->
  <!--  ScriptMisChats -->
  <script src="https://mischats.com/supportboard/js/min/jquery.min.js"></script>
  <script id = "sbinit" src = "https://mischats.com/supportboard/js/main.js?lang=es&mode=1"> </script> 

  <script src="./assets/js/jquery.slim.min.js"></script>
  <script src="./assets/js/myJquery.js"></script>
  <!-- <script src="<?=base_url()?>/assets/js/materialize.js"></script> -->
  <!-- <script src="<?=base_url()?>/assets/js/init.js"></script> 
  <script>
    var myCarousel = document.querySelector('#myCarousel')
var carousel = new bootstrap.Carousel(myCarousel, {
  interval: 30,
  wrap: false
})
  </script>-->
  
  <script type="text/javascript" src="https://checkout.epayco.co/checkout.js">   </script>

  </body>
</html>
