
<div class="container" id="portafolio_contacto">
    <?php
    if(isset($_SESSION['correo'])){
    echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Datos enviados con exíto.</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    unset($_SESSION['correo']);
}
    ?>
    <div class="">
        <div class="">
            <div class="row row-cols-md-12">
                <div class="card col-ms-5 h-100 no-border " >
                    <div class="row g-0 background-s-portafolio">
                        <div class="image-portafolio col-md-4 background-s-portafolio">
                            <img src="./php/img/ICONO-220X300.png" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title">Solicita el portafolio de servicios y conoce más sobre nosotros.</h3>
                                <form action="correo_portafolio.php" method="post">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <input type="text" class="form-control inputs-portafolio" name="nombre" placeholder="Ingrese su nombre completo" aria-label="Ingrese su nombre completo" required>
                                        </div>
                                        <div class="col-12">
                                            <input type="email" class="form-control inputs-portafolio" name="correo" placeholder="Ingrese su correo" aria-label="Ingrese su correo" required>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control inputs-portafolio" name="celular" placeholder="Ingrese su celular" aria-label="Ingrese su celular" required>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-lg fondo-gradian">SOLICITAR</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
