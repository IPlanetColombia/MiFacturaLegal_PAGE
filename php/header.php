<?php
  $conection = new Conection();
  $base_url = $conection->base_url();
  $query = 'SELECT * FROM header ORDER BY orden ASC';
  $query_general = "SELECT * FROM head";
  // $data = $conection->conection()->query($query);
  $data = mysqli_fetch_all($conection->conection()->query($query));
  $general = mysqli_fetch_array($conection->conection()->query($query_general));
  $redes = ['facebook', 'instagram', 'youtube', 'twitter'];
?>
<div class="encabezado" id="encabezado">
    <nav id="menu" class="navbar navbar-expand-lg navbar-light fondo-transparente">
        <div class="container-fluid" >
            <div id="botones-nav" class="navbar-brand menu_list">
                <?php foreach($data as $row):?>
                  <?php
                    $red_validator = true;
                    $red = strtolower($row[1]);
                    $red = str_replace(' ', '', $red);
                    foreach($redes as $red_social){
                      if ($red === $red_social)
                        $red_validator = false;
                    }
                  ?>
                  <?php if ($row ===  reset($data)): ?>
                    <a class="btn btn-sm mr-2 home-id color-purple-icon" id="menu_first"  aria-current="page" href="<?= $row[3] ?>" target="_blank"><strong><div class="icon"><?= !empty($row[2]) ? '<i class="material-icons">'.$row[2].'</i>':'' ?><?= $row[1] ?></div></strong></a>
                  <?php else: ?>
                    <?php if ($red_validator): ?>
                      <a class="btn btn-sm color-purple mr-2" aria-current="page" target="_blank" href="<?= $row[3] ?>"><div class="icon"><?= $row[2] ? '<i class="material-icons">'.$row[2].'</i>':'' ?> <?= $row[1] ?></div></a>
                    <?php endif ?>
                  <?php endif ?>
                  <!-- <a class="btn btn-sm btn-primary" aria-current="page" href="https://facturadorv2.mifacturalegal.com/"><i class="fa fa-user"></i> Ingresar</a> -->
                <?php endforeach ?>
            </div>
            <a id="logo-fml-nav" class="navbar-brand home-id" href="#"><img src="<?= $base_url ?>/php/img/head/<?= $general['favicon'] ?>"> <?= $general['name'] ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-text">
        <div class="collapse navbar-collapse " id="navbarSupportedContent" >
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!--<li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>-->
              <!-- <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="#comparaciones">Comparaciones</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="#como">Servicios</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="#nosotros">Nosotros</a>
               </li>-->
            
            <?php foreach($data as $row): ?>
              <?php
                $red_validator = true;
                $red = empty($row[2]) ? strtolower($row[1]):strtolower($row[2]);
                $red = str_replace(' ', '', $red);
                $icon = '';
                $icon = '<i class="fab fa-'.$red.'"></i>';
                foreach($redes as $red_social){
                  if ($red == $red_social){
                    $red_validator = false;
                  }
                }
              ?>
              <?php if ($red_validator): ?>
                <li class="nav-item d-md-none home-id">
                  <a class="nav-link active auth home-id" aria-current="page" target="_blank" href="<?= $row[3] ?>"><div class="icon"><?= !empty($row[2]) ? '<i class="material-icons">'.$row[2].'</i>':'' ?><?= $row[1] ?></div></a>
                </li>
              <?php else: ?>
                <li class="nav-item redes_sociales <?= $red ?>">
                  <a class="nav-link" aria-current="page" href="<?= $row[3] ?>" target="_blank"><?= $icon ?></a>
                </li>
              <?php endif ?>

            <?php endforeach ?>
            <!-- <li class="nav-item d-md-none home-id">
              <a class="nav-link active auth home-id" aria-current="page" href="https://facturadorv2.mifacturalegal.com/"> Ingresar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="https://www.instagram.com/mifacturalegal/?utm_medium=copy_link"><img
                          src="php/img/insta.png" width="30" height="24" alt=""></a>
            </li> -->
          </ul>

    </span>
        </div>
        </div>
    </nav>
</div>
