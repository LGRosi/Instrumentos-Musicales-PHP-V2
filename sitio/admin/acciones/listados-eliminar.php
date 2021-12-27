<?php

require_once __DIR__ . '/../../bootstrap/init.php';


$autenticacion = new Autenticacion();
if(!$autenticacion->estaAutenticado()) {
    $_SESSION['mensaje_error'] = "Esta acción requiere de haber iniciado sesión.";
    header('Location: ../index.php?p=login');
    exit;
}

$id = $_POST['id'];

try {
    $listado = new Listado();
    $listado->eliminar($id);

    // Enviar un mensaje de éxito...
    $_SESSION['mensaje_exito'] = "¡Éxito! El instrumento fue eliminado correctamente.";
    header("Location: ../index.php?p=listados");
    exit;
} catch(Exception $e) {
    // Enviar un mensaje de error...
    $_SESSION['mensaje_error'] = "¡Ocurrió un error inesperado! El instrumento no pudo ser eliminado.";
    header("Location: ../index.php?p=listados");
    exit;
}
