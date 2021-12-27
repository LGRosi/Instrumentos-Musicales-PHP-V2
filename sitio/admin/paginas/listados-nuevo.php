<?php
    if (isset($_SESSION['errores'])) {
        $errores = $_SESSION['errores'];
        unset($_SESSION['errores']);
    } else {
        $errores = [];
    }


    if (isset($_SESSION['old_data'])) {
        $oldData = $_SESSION['old_data'];
        unset($_SESSION['old_data']);
    } else {
        $oldData = [];
    }

?>

<section class="container my-5 px-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <h2>Publicar un nuevo Instrumento</h2>
            <p class="pb-3">Completá el fomulario con los datos del instrumento. Cuando esté completo, apretá "Publicar".</p>
        </div>
        <form class="col-md-8 my-3 pr-lg-5 colorletraslabel" action="acciones/listados-crear.php" method="post" enctype="multipart/form-data">
            <div class="form-fila mb-5">
                <label for="titulo">Titulo</label>
                <input 
                type="text" 
                id="titulo"
                name="titulo" 
                class="form-control form2" 
                placeholder="Titulo..."
                aria-describedby="help-titulo <?= isset($errores['titulo']) ? 'error-titulo' : '';?>" 
                value="<?= $oldData['titulo'] ?? '';?>"
                >
                <?php
                    if (isset($errores['titulo'])): 
                ?>
                    <div class="text-danger" id="error-titulo">Error: <?= $errores['titulo'];?></div>
                <?php
                    endif; 
                ?>
                <div class="text-muted" id="help-titulo">El título debe tener al menos 3 caracteres</div>
            </div>
    
            <div class="form-fila mb-5">
                <label for="descripcion">Descripción</label>
                <textarea 
                id="descripcion"
                name="descripcion" 
                class="form-control form" 
                cols="40" 
                rows="3" 
                placeholder="Descripción..."
                aria-describedby="help-descripcion <?= isset($errores['descripcion']) ? 'error-descripcion' : '';?>"
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

            <div class="form-fila pb-5">
                <label class="d-block" for="imgMiniatura">Imagen</label>
                <input type="file" name="imgMiniatura" id="imgMiniatura">
            </div>
    
            <button type="submit" class="form2 col-12 col-md-5 btnservicios button">PUBLICAR</button>
        </form>
    </div>
</section>
