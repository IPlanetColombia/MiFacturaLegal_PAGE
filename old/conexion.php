<?php
$link = mysqli_connect("localhost", "mifacturalegal_landing","I49bx3kk!!", "mifacturalegal_landing");
$link->set_charset("utf8");
$baseUrl = 'cms/public/assets/uploads/files/';


if (!$link) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$navbar = $link->query('SELECT * FROM web_iplanet_navbar');
$navbar2 = $link->query('SELECT * FROM web_iplanet_navbar');
$data = $link->query('SELECT * FROM web_iplanet_general');
$general = $data->fetch_object();
$about = $link->query('SELECT * FROM web_iplanet_about');
$data = $link->query('SELECT * FROM web_iplanet_section');
$section = $data->fetch_object();
$category = $link->query('SELECT * FROM web_iplanet_category');
$data = $link->query('SELECT * FROM web_iplanet_header');
$header = $data->fetch_object();

function article($id) {
    $link = mysqli_connect("localhost", "mifacturalegal_landing","I49bx3kk!!", "mifacturalegal_landing");
    $link->set_charset("utf8");
    $article = $link->query('SELECT * FROM web_iplanet_article WHERE category_id = '. $id);
    $data = [];
    while($file = $article->fetch_object()) {
        array_push($data, $file);
    }
    return $data;
}




mysqli_close($link);