<?php
    $listados = (new Listado())->todo();
?>

<main class="container my-5">
    <h2 class="mb-5 text-center">Administración del Listado</h2>
    <div class="row">
        <div class="col-12 mb-3 d-flex justify-content-end">
            <a href="index.php?p=listados-nuevo" class="btn btn-outline-primary mb-3">Publicar nuevo instrumento</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th class="pr-5" scope="col">Precio</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($listados as $listado): ?>
                        <tr>
                            <td><?= $listado->getListadoId();?></td>
                            <td><?= htmlspecialchars($listado->getTitulo());?></td>
                            <td><?= htmlspecialchars($listado->getPrecio());?></td>
                            <td><?= htmlspecialchars($listado->getDescripcion());?></td>
                            <td><img src="<?= '../imagenes/' . $listado->getImgMiniatura();?>" alt="<?= htmlspecialchars($listado->getAlt());?>"></td>  
                            <td>
                                <a class="btn btn-primary mb-3" href="index.php?p=listados-editar&id=<?= $listado->getListadoId();?>">Editar</a>
                                <form action="acciones/listados-eliminar.php?id=<?= $listado->getListadoId();?>" method="post" class="form-eliminar">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($listado->getListadoId());?>">
                                    <button class="btn btn-danger" type="submit">Eliminar<span class="ocultarContenido">El listado titulado: <?= htmlspecialchars($listado->getTitulo());?></span></button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php
                    endforeach; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('.form-eliminar');
    for(let i = 0; i < forms.length; i++) {
        forms[i].addEventListener('submit', function(ev) {
            const confirmado = confirm('¿Querés realmente eliminar este listado? Esta acción es irreversible.');

            if(!confirmado) {
                ev.preventDefault();
            }
        });
    }
});
</script>


