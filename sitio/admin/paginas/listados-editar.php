<?php

$listado = (new Listado())->traerPorPk($_GET['id']); 

if(isset($_SESSION['errores'])) {
    $errores = $_SESSION['errores'];
    unset($_SESSION['errores']);
} else {
    $errores = [];
}
if(isset($_SESSION['old_data'])) {
    $oldData = $_SESSION['old_data'];
    unset($_SESSION['old_data']);
} else {
    $oldData = [
        'id'                => $listado->getListadoId(),
        'titulo'            => $listado->getTitulo(),
        'descripcion'       => $listado->getDescripcion(),
        'imgMiniatura'      => $listado->getImgMiniatura(),
    ];
}
?>
<main>
    <div class="container">
        <h2 class="mb-1">Editar listado</h2>

        <p class="mb-5">Modificá los datos del listado que quieras cambiar. Cuando esté completo, apretá "Actualizar".</p>
       
        <form action="acciones/listados-editar.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $oldData['id'];?>">
            <div class="form-group mb-5">
                <label for="titulo">Título</label>
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    class="form-control"
                    aria-describedby="help-titulo <?= isset($errores['titulo']) ? 'error-titulo' : '';?>"
                    value="<?= $oldData['titulo'] ?? '';?>"
                >
                <?php
                if(isset($errores['titulo'])):
                ?>
                    <div class="text-danger" id="error-titulo"><span class="visually-hidden">Error: </span><?= $errores['titulo'];?></div>
                <?php
                endif;
                ?>
                <div class="text-muted" id="help-titulo">El título debe tener al menos 3 caracteres.</div>
            </div>

            <div class="form-group mb-5">
                <label for="descripcion">Descripción</label>
                <textarea 
                id="descripcion"
                class="form-control form" 
                name="descripcion" 
                cols="40" 
                rows="3" 
                placeholder="Descripción..."
                <?= isset($errores['descripcion']) ? 'aria-describedby="error-descripcion"' : '';?>
                ><?= $oldData['descripcion'] ?? '';?></textarea>
                <?php
                    if (isset($errores['descripcion'])): 
                ?>
                    <div class="text-danger" id="error-descripcion">Error: <?= $errores['descripcion'];?></div>
                <?php
                    endif; 
                ?>
                <div class="text-muted" id="help-descripcion">La descripción debe ser mayor a 100 caracteres</div>
            </div>
            
            <div class="form-group mb-5">
                <p>Imagen actual</p>
                <div>
                    <img src="<?= '../imagenes/' . $listado->getImgMiniatura();?>" alt="Previsualización de la imagen" />
                </div>
                <p class="text-muted">Si querés cambiar la imagen, elegí una nueva abajo. Sino, dejá el campo vacío.</p>
            </div>
            <div class="form-fila">
                <label for="imgMiniatura">Imagen (opcional)</label>
                <input type="file" id="imgMiniatura" name="imgMiniatura" class="form-control border-0">
            </div>
            
            <button class="form2 my-5 w-25 btnservicios button" type="submit">ACTUALIZAR</button>
        </form>
    </div>
</main>
