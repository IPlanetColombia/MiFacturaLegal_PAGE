<?php
    require_once 'conexion.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="EcologyTheme">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $name = $general->general_name;
    echo $name; ?></title>
    <link rel="shortcut icon" href="<?= $baseUrl.$general->general_logo ?>" type="image/x-icon">
    <!-- Goole Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/assets/bootstrap.min.css">
    <!-- Font awsome CSS -->
    <link rel="stylesheet" href="css/assets/flaticon.css">
    <link rel="stylesheet" href="css/assets/magnific-popup.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/assets/owl.carousel.css">
    <link rel="stylesheet" href="css/assets/owl.theme.css">
    <link rel="stylesheet" href="css/assets/animate.css">
    <link rel="stylesheet" href="css/assets/preloader.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="css/assets/slick.css">
    <!-- Mean Menu-->
    <link rel="stylesheet" href="css/assets/meanmenu.css">

    <!-- main style-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<header class="header">
    <div class="header-top">
        <div class="sassnex_nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light bg-faded">
                    <a class="navbar-brand font-weight-bold" href="index.html"><?=  $general->general_name  ?></a>
                    <div class="collapse navbar-collapse mean_menu" id="navbarSupportedContent">
                        <ul class="navbar-nav nav ml-auto">
                            <?php while ($item = $navbar2->fetch_object()): ?>
                                <li class="nav-item"><a href="#" class="nav-link"><?= $item->navbar_option ?> </a></li>
                           <?php endwhile?>
                        </ul>
                    </div>
                    <!--<div class="mr-auto others_option">
                        <ul class="navbar-nav mx-auto d-flex">
                            <li class="nav-item cart_wrapper"><i class="flaticon-shopping-cart cart_icon"></i>
                                <ul class="cart_list">
                                    <li class="d-flex justify-content-between">
                                        <div class="cart-img">
                                            <a href="#"><img alt="" src="images/products/product_1.png" class="img-fluid"></a>
                                        </div>
                                        <div class="cart-info">
                                            <h4><a href="#">Vestibulum suscipit</a></h4>
                                            <span>$165.00 <span>x 1</span></span>
                                        </div>
                                        <div class="del-icon">
                                            <i class="flaticon-close"></i>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <div class="cart-img">
                                            <a href="#"><img alt="" src="images/products/product_2.png" class="img-fluid"></a>
                                        </div>
                                        <div class="cart-info">
                                            <h4><a href="#">Vestibulum suscipit</a></h4>
                                            <span>$165.00 <span>x 1</span></span>
                                        </div>
                                        <div class="del-icon">
                                            <i class="flaticon-close"></i>
                                        </div>
                                    </li>
                                    <li class="cart-border">
                                        <div class="subtotal-text">Subtotal: </div>
                                        <div class="subtotal-price">$300.00</div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <a class="cart-button" href="#">view cart</a>
                                        <a class="checkout" href="#">checkout</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="header-search-box btn-color-dark">
                                <a href="#header-search" title="Search">
                                    <i class="flaticon-search search_btn"></i>
                                </a>
                            </li>
                            <li class="nav-item sign-in-option btn-demo " data-toggle="modal" data-target="#myModal2">
                                <div class="side_menu">
                                    <span class="line_1"></span>
                                    <span class="line_2"></span>
                                    <span class="line_3"></span>
                                </div>
                            </li>
                        </ul>
                    </div>-->
                </nav><!-- END NAVBAR -->
            </div>
        </div>
    </div>
</header> <!-- End Header -->




<div class="sassnex-bc">
    <div class="intro_wrapper">
        <div class="container">  
            <div class="row" style="padding:0px;">        
                <div class="col-sm-12 col-md-12 col-lg-12" >
                    <div class="container">
                    <div class="intro_text">
                        <h4 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s" class="width:calc(100% - 50px);"><?= $header->header_title ?></h4>
                        <div class="select_pages">
                            <span><?= $header->header_subtitle ?></span> 
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>  
    <div class="banner_shapes">
        <img src="images/shapes/app_1.png" alt="" class="agency_1 img-fluid">
        <img src="images/shapes/app_4.png" alt="" class="agency_2">
        <img src="images/shapes/app_4.png" alt="" class="agency_6">        
        <img src="images/shapes/app_3.png" alt="" class="agency_3">      
    </div>
</div>




<!-- Search Box Start Here -->
<div id="header-search" class="header-search">
    <button type="button" class="close">×</button>
    <form class="header-search-form">
        <input type="search" value="" placeholder="Type here........" />
        <button type="submit" class="search-btn">
            <i class="flaticon-search"></i>
        </button>
    </form>
</div>


<!-- Sidebar Menu -->
<div class="sidebar_menu">
    <!-- Modal -->
    <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="flaticon-close"></i></span></button>
                    <h2 class="modal-title" id="myModalLabel2"><a href="#"><img src="images/logo.png" alt=""></a><span class="disabled">logo</span></h2>
                </div>
                <div class="modal-body">
                    <div class="bar-nav">
                        <div class="bar-top">
                            <h2>Sassnex Pages</h2>
                            <ul>
                                <li><a href="index.html">App Landing</a></li>
                                <li><a href="product-landing.html">Product Landing</a></li>
                                <li><a href="startup-agency.html">Startup Agency</a></li>
                                <li><a href="payment-page.html">Payment Processing</a></li>
                                <li><a href="marketing.html">Digital Marketing</a></li>
                                <li><a href="sass-landing.html">Sass Landing</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="pricing-table.html">Pricing table Page</a></li>
                                <li><a href="shop-page.html">Shop Page</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="sign-in.html">Sign In </a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bar-contact">
                        <span>Contact</span>
                        <span>+44 7700 900077</span>
                        <span>support@sassnex.com</span>
                    </div>

                    <div class="bar-icon">
                        <div class="serach_option widget_single">
                            <form>
                                <input type="text" name="Name" class="input-c" placeholder="Name">
                                <button type="submit"><i class="flaticon-paper-plane"></i></button>
                            </form>
                        </div>
                        <ul class="social_iocns d-flex ">
                            <li><a href="#"><i class="flaticon-facebook-logo icon_tw"></i></a></li>
                            <li><a href="#"><i class="flaticon-twitter icon_fb"></i></a></li>
                            <li><a href="#"><i class="flaticon-instagram-logo icon_pin"></i></a></li>
                            <li><a href="#"><i class="flaticon-linkedin-logo icon_link"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
</div><!-- sidebar -->

<div class="features" id="features_app">
    <div class="container">
        <?php while ($item =  $about->fetch_object()): ?>
            <div class="row single_features">
            <div class="col-12 col-md-6 col-lg-5">
                <div class="feature_intro feature_intro_2">
                    <h2 class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".2s"><?= $item->about_title ?></h2>
                    <p class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".3s"><?= $item->about_description ?></p>
                    <a href="#" class="default_btn d_btn_gradient btn_gradient wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".4s">Get Started</a>
                </div>

            </div>
            <div class="col-12 col-md-6 col-lg-7">
                <div class="feature_banner feature_banner_r_2 wow fadeInRight" data-wow-duration="2s" data-wow-delay=".3s">
                    <img src="<?= $baseUrl.$item->about_img ?>" alt="">
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<section class="pricing_payment" id="pricing_payment_inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2><?= $section->section_title ?></h2>
                    <p><?= $section->section_description ?></p>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="payment_pricing_wrapper">
                    <div class="pricing_icon">
                        <img src="<?= $baseUrl.$section->section_card_img ?>" alt="">
                    </div>
                    <div class="pricing_content">
                        <h3><?= $section->section_card_title ?></h3>
                        <p><?= $section->section_card_description ?></p>
                        <a href="<?= $baseUrl.$section->section_card_button_url ?>" title="">Ver Mas</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="payment_pricing_wrapper">
                    <div class="pricing_icon">
                        <img src="<?= $baseUrl.$section->section_card2_img ?>" alt="">
                    </div>
                    <div class="pricing_content">
                        <h3><?= $section->section_card2_title ?></h3>
                        <p><?= $section->section_card2_description ?></p>
                        <a href="<?= $baseUrl.$section->section_card2_button_url ?>" title="">Ver Mas</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="payment_pricing_wrapper">
                    <div class="pricing_icon">
                        <img src="<?= $baseUrl.$section->section_card3_img ?>" alt="">
                    </div>
                    <div class="pricing_content">
                        <h3><?= $section->section_card3_title ?></h3>
                        <p><?= $section->section_card3_description ?></p>
                        <a href="<?= $baseUrl.$section->section_card3_button_url ?>" title="">Ver Mas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="images/shapes/blure_shape.png" alt="" class="shape_blure">
</section>



<!--========={ Ecologytheme Releases Project }========-->
<?php while($item = $category->fetch_object()): ?>
<section class="pricing_packages">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2><?= $item->category_title ?></h2>
                    <p><?= $item->category_description ?> </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
               <!-- <div role="tabpanel">
                    <div class="d-flex justify-content-between">
                        <div class="btn-items d-flex">
                            <ul class="nav nav-tabs " role="tablist">
                                <li class="nav-item">
                                    <a href="#tab1" class="nav-link active" aria-controls="tab1" role="tab" data-toggle="tab">Monthly</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab2" class="nav-link" aria-controls="tab2" role="tab" data-toggle="tab">Yearly</a>
                                </li>

                            </ul>
                        </div>
                    </div>-->

                    <!-- Tab panes -->
                    <div class="tab-content eco_templates_items">
                        <div role="tabpanel" class="tab-pane active in fade show" id="tab1">
                            <div class="pricing_payment">
                                <div class="row">
                           
                                    <?php
                                 
                                    foreach(article($item->category_id) as $card): ?>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="payment_pricing_wrapper">
                                                <div class="pricing_icon">
                                                    <img src="<?= $baseUrl.$card->article_img ?>" alt="">
                                                </div>
                                                <div class="pricing_content">
                                                    <h3><?= $card->article_title ?></h3>
                                                    <h4></h4>
                                                    <ul>
                                                        <?= $card->article_description ?>
                                                    </ul> 
                                                </div>
                                                <!--<a href="" title="">Learn More</a>-->
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab2">
                            <div class="pricing_payment">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="payment_pricing_wrapper">
                                            <div class="pricing_icon">
                                                <img src="images/icons/paynent_pricing_1.png" alt="">
                                            </div>
                                            <div class="pricing_content">
                                                <h3>Startup</h3>
                                                <span>Per Year</span>
                                                <h4>$40.39</h4>
                                                <ul class="">
                                                    <li>Auto-import time & expenses into</li>
                                                    <li>Envoices Unlimited recurring</li>
                                                    <li>Lvoices with auto-bill Invoicing </li>
                                                    <li>Saved items & inventory</li>
                                                </ul>
                                            </div>
                                            <a href="" title="">Learn More</a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="payment_pricing_wrapper">
                                            <div class="pricing_icon">
                                                <img src="images/icons/paynent_pricing_2.png" alt="">
                                            </div>
                                            <div class="pricing_content">
                                                <h3>Smarter</h3>
                                                <span>Per Year</span>
                                                <h4>$15.39</h4>
                                                <ul class="">
                                                    <li>Auto-import time & expenses into</li>
                                                    <li>Envoices Unlimited recurring</li>
                                                    <li>Lvoices with auto-bill Invoicing </li>
                                                    <li>Saved items & inventory</li>
                                                </ul>
                                            </div>
                                            <a href="" title="">Learn More</a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="payment_pricing_wrapper">
                                            <div class="pricing_icon">
                                                <img src="images/icons/paynent_pricing_3.png" alt="">
                                            </div>
                                            <div class="pricing_content">
                                                <h3>Growth</h3>
                                                <span>Per Year</span>
                                                <h4>$60.39</h4>
                                                <ul class="">
                                                    <li>Auto-import time & expenses into</li>
                                                    <li>Envoices Unlimited recurring</li>
                                                    <li>Lvoices with auto-bill Invoicing </li>
                                                    <li>Saved items & inventory</li>
                                                </ul>
                                            </div>
                                            <a href="" title="">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Ends: .feature-tabs -->
        </div>
    </div>
    <img src="images/shapes/blure_shape.png" alt="" class="shape_blure">
</section>
<?php endwhile ?>



<!-- star Secured section -->
<!--<div class="free_trial_inner_page">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="need_help_wrapper">
                    <div class="subscribe_wrapper justify-content-between d-flex ">
                        <div class="subscribe_title">
                            <h2>Start 14 days free trial</h2>
                            <p>Pretium pulvinar aenean honcus eget adipiscing etiam arcu.</p>
                        </div>
                        <div class="free_trial_btn">
                            <a href="#" class="chat_btn d_btn_gradient btn_gradient">Get Started</a>
                        </div>
                    </div>
                    <div class="banner_shapes">
                        <img src="images/shapes/sub_1.png" alt="" class="app_1">
                        <img src="images/shapes/sub_2.png" alt="" class="app_2">
                        <img src="images/shapes/sub_3.png" alt="" class="app_3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>--><!-- End Secured section -->



<footer id="footer_app">
    <div class="container">
        <div class="footer_top footer_top_u">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="footer-title">
                     <h2><?= $general->general_name  ?></h2>
                        <p><?= $general->general_description ?></p>
                        <ul class="social_iocns d-flex">
                            <li><a href="<?= $general->general_facebook ?>"><i class="flaticon-facebook-logo icon_tw"></i></a></li>
                            <li><a href="<?= $general->general_twitter ?>"><i class="flaticon-twitter icon_fb"></i></a></li>
                            <li><a href="<?= $general->general_twitter ?>"><i class="flaticon-instagram-logo icon_pin"></i></a></li>
                            <li><a href="<?= $general->general_linkedin ?>"><i class="flaticon-linkedin-logo icon_link"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="company-content">
                        <h3>Informacion de Contacto</h3>
                        <ul class="location_info">
                            <li><i class="flaticon-placeholder"></i><?= $general->general_address ?></li>
                            <li><i class="flaticon-push-pin"></i><?= $general->general_keyword ?></li>
                            <li><i class="flaticon-envelope"></i><?= $general->general_email ?></li>
                            <li><i class="flaticon-phone-call"></i>+51 <?= $general->general_telephone ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="company-content about_footer">
                        <h3>Menu</h3>
                        <ul>
                            <?php while ($item = $navbar->fetch_object()): ?>
                            <li><a href="#"><?= $item->navbar_option ?></a></li>
                           <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
               <!-- <div class="col-12 col-md-6 col-lg-2">
                    <div class="company-content">
                        <h3>Team Solutions</h3>
                        <ul>
                            <li><a href="#">Imperdiet</a></li>
                            <li><a href="#">Partueient</a></li>
                            <li><a href="#">Faucibus</a></li>
                            <li><a href="#">Ultricies</a></li>
                            <li><a href="#">Vitae vel</a></li>
                        </ul>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright  &copy; <?= $name. ' '.date('Y') ?>. All right reserved.</p>
                </div>
                <!--<div class="col-md-6">
                    <ul class="copy_right_items d-flex justify-content-end">
                        <li><a href="#">Terms & Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</footer><!-- End Footer -->


<section id="scroll-top" class="scroll-top">
    <h2 class="disabled">Scroll to top</h2>
    <div class="to-top pos-rtive">
        <a href="#"><i class = "flaticon-right-arrow"></i></a>
    </div>
</section>

<!-- JavaScript -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/slick.min.js"></script>
<!-- Main Menu -->
<script src="js/jquery.meanmenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
