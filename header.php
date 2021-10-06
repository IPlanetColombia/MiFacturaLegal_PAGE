<!--Header Start-->
<header id="home" class="cursor-light">
<?php 
                             if(isset($_GET['success'])){
                                echo  '<div class="alert alert-success" role="alert" style="position:absolute; width:100%;z-index:1000;"><strong>
                                Sus datos fueron enviados, recibirá un correo con la documentación necesaria. Gracias.</strong><button type="button" class="close fa-2x" data-dismiss="alert" aria-label="Close">
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

    <div class="inner-header nav-icon">
        <div class="main-navigation">
            <div class="container">
                <div class="row">
                
                    <div class="col-4 col-lg-3">
                        <a class="navbar-brand link" href="index-seo-agency.html">
                            <img src="seo-agency\img\logo-mifacturalegal.png" class="logo-simple" alt="logo" width="200">
                            <img src="seo-agency\img\logo-mifacturalegal.png" class="logo-fixed" alt="logo">
                        </a>
                    </div>
                    <div class="col-8 col-lg-9 simple-navbar d-flex align-items-center justify-content-end">
                        <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="navbar-nav ml-auto">
                                    <a class="nav-link home active link" href="#">HOME</a>
                                    <a class="nav-link scroll link" href="#stats-sec">Qué es ?</a>
                                    <a class="nav-link scroll link" href="#portfolio-sec">Caracteristicas</a>
                                    <a class="nav-link scroll link" href="#pricing-sec">Precios</a>
                                    <!--<a class="nav-link scroll link" href="#contact-sec">Contacto</a>-->
                                    <!--<a href="" class="nav-link scroll link"><i aria-hidden="true" class="fas fa-user"></i></a>-->
                                    <a class="nav-link btn btn-medium btn-rounded btn-transparent-white btn-hvr-white ml-3" data-animation-duration="500"  href="https://facturadorv2.mifacturalegal.com/solicitudes/registro">Registrar 
                                        <div class="btn-hvr-setting">
                                            <ul class="btn-hvr-setting-inner">
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                            </ul>
                                        </div>
                                    </a>
                                    <a class="nav-link btn btn-medium btn-rounded btn-transparent-white btn-hvr-white ml-3" data-animation-duration="500" href="https://facturadorv2.mifacturalegal.com/"><i class="fas fa-user"></i>  Ingresar 
                                        <div class="btn-hvr-setting">
                                            <ul class="btn-hvr-setting-inner">
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                            </ul>
                                        </div>
                                        
                                    </a>
                                    
                                    <span class="menu-line"><i aria-hidden="true" class="fa fa-angle-down"></i></span>
                                </div>
                                
                            </div>
                        </nav>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--toggle btn-->
        <a href="javascript:void(0)" class="sidemenu_btn link" id="sidemenu_toggle">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </div>
    <!--Side Nav-->
    <div class="side-menu hidden side-menu-opacity">
        <div class="bg-overlay"></div>
        <div class="inner-wrapper">
            <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
            <div class="container">
                <div class="row w-100 side-menu-inner-content">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <a href="index-seo-agency.html" class="navbar-brand"><img src="seo-agency\img\logo-mifacturalegal.png" alt="logo" width="30%"></a>
                </div>
                <div class="col-12 col-lg-8">
                    <nav class="side-nav w-100">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#home">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#stats-sec">Qué es MiFacturaLegal ?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#portfolio-sec">Caracteristicas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#pricing-sec">Precios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-transparent-white btn-hvr-white" data-animation-duration="500"  href="https://facturadorv2.mifacturalegal.com/solicitudes/registro">Registrar 
                                        <div class="btn-hvr-setting">
                                            <ul class="btn-hvr-setting-inner">
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                            </ul>
                                        </div></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-transparent-white btn-hvr-white" data-animation-duration="500" href="https://facturadorv2.mifacturalegal.com/"><i class="fas fa-user"></i>  Ingresar 
                                        <div class="btn-hvr-setting">
                                            <ul class="btn-hvr-setting-inner">
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                                <li class="btn-hvr-effect"></li>
                                            </ul>
                                        </div></a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-lg-4 d-flex align-items-center">
                    <div class="side-footer text-white w-100">
                        <div class="menu-company-details">
                            <span>57 +1 300304 72 77</span>
                            <span>info@mifacturalegal.com</span>
                        </div>
                        <ul class="social-icons-simple">
                            <li><a class="facebook-text-hvr" target="_blank" href="https://api.whatsapp.com/send?phone=573003047277&text=Hola%20,%20estoy%20interesado%20en%20contratar.">
							<i class="fab fa-whatsapp"></i> </a> </li>
                          
                        </ul>
                        <p class="text-white">&copy; 2020 Iplanet Colombia SAS.</p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>

</header>
<!--Header End-->
<div class="animated-modal fadeIn modal modal-lg quote-content" id="animatedModal">
            <!--Heading-->
            <div class="heading-area pb-2 mx-570">
                <h2 class="title mt-2">Datos de Registro</h2>
                <span class="sub-title">Empecemos el proceso de acompañamiento con estos datos.</span>
            </div>
            <hr>
            <!--Contact Form-->
            <form class="contact-form" id="modal-contact-form-data" method="post" action="https://facturadorv2.mifacturalegal.com/solicitud/guardarsolicitante" >
                <div class="row">
                    <!--Result-->
                    <div class="col-12" id="quote_result"></div>

                    <!--Left Column-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <input class="form-control" id="quote_name" name="nempresa" placeholder="Nombre de la Empresa o Persona Natural" required="" type="text">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input class="form-control" id="quote_email" name="nit" placeholder="NIT o Cédula" required="" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="quote_budget" name="email" placeholder="Correo de Contacto" required="" type="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="quote_budget" name="emailem" placeholder="Correo de la Empresa" required="" type="email">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input class="form-control" id="quote_email" name="direccion" placeholder="Direccion y Ciudad" required="" type="text">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input class="form-control" id="quote_type" name="rl" placeholder="Representante Legal" required="" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="tdocumento" class="form-control" id="" required="">
                                <option value="CC">Seleccione tipo documento...</option>
                                <option value="CC">CC</option>
                                <option value="NIT">NIT</option>
                                <option value="OTRO">OTRO</option>
                            </select>
                        </div>
                    </div>
                        
                        

                    <!--Right Column-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="quote_address" name="documento" placeholder="Número Documento" required="" type="text">
                        </div>
                    </div>

                    <!--Full Column-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" id="quote_message" name="observaciones" placeholder="Observaciones"></textarea>
                        </div>
                    </div>

                    <!--Button-->
                    <div class="col-md-12">

                        <div class="form-check">
                            <!--<label class="checkbox-lable">Contact by phone ins preffered
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>-->
                        </div>
<br>
                        <button type="submit" class="btn btn-large btn-rounded btn-blue btn-hvr-pink modal_contact_btn" >
                        <i class="fa fa-spinner fa-spin mr-2 d-none" aria-hidden="true"></i><b>Guardar</b>
                        <div class="btn-hvr-setting">
                            <ul class="btn-hvr-setting-inner">
                                <li class="btn-hvr-effect"></li>
                                <li class="btn-hvr-effect"></li>
                                <li class="btn-hvr-effect"></li>
                                <li class="btn-hvr-effect"></li>
                            </ul>
                        </div>
                        </button>

                        
                    </div>

                </div>
            </form>
        </div>