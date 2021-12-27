<?php

require_once __DIR__ . '/../../bootstrap/init.php';


$autenticacion = new Autenticacion();
if(!$autenticacion->estaAutenticado()) {
    $_SESSION['mensaje_error'] = "Esta acción requiere de haber iniciado sesión.";
    header('Location: ../index.php?p=login');
    exit;
}


$titulo                 = $_POST['titulo'];
$precio                 = $_POST['precio'];
$descripcion            = $_POST['descripcion'];
$imgMiniatura           = $_FILES['imgMiniatura'];


$validator = new ListadoCrearValidador($_POST);
$validator->ejecutar();

if($validator->hasErrors()) {
    $_SESSION['errores'] = $validator->getErrores(); 
    $_SESSION['old_data'] = $_POST;
    header("Location: ../index.php?p=listados-nuevo");
    exit;
}


if(!empty($imgMiniatura['tmp_name'])) {
    $nombreImagen = date('YmdHis_') . $imgMiniatura['name'];

    move_uploaded_file($imgMiniatura['tmp_name'], __DIR__ . '/../../imagenes/' . $nombreImagen);

} else {
    $nombreImagen = '';
}

try { 
    $listado = new Listado();
    $listado->crear([
        'usuario_fk' => 1,
        'titulo' => $titulo,
        'precio' => $precio,
        'descripcion' => $descripcion,
        'imgMiniatura' => $nombreImagen,
    ]);

    $_SESSION['mensaje_exito'] = "¡Éxito! El instrumento fue publicado correctamente.";
    header("Location: ../index.php?p=listados");
    exit;
} catch(PDOException $e) {
    $_SESSION['mensaje_error'] = "¡Ocurrió un error inesperado! El instrumento no pudo ser publicado.";
    header("Location: ../index.php?p=listados-nuevo");
    exit;
    
}