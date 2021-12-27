<?php

    $idListado = (int) $_GET['id'];
    $listado = new Listado(); 
    $listado = $listado->traerPorPk($idListado);
?>

<section class="container px-4 pt-3 my-5">
    <article class="row">
        <div class="col-md-4 mb-5">
            <h2 class="h20">Detalle del producto</h2>
            <figure>
                <picture>
                    <source media="(max-width: 599px)" srcset="imagenes/<?= htmlspecialchars($listado->getImgCelular());?>">
                    <source media="(max-width: 800px)" srcset="imagenes/<?= htmlspecialchars($listado->getImgTablet());?>">    
                    <img src="imagenes/<?= htmlspecialchars($listado->getImgPc());?>" alt="<?= htmlspecialchars($listado->getAlt());?>" title="<?= htmlspecialchars($listado->getTitle());?>" class="img-fluid imgradius mt-4" />
                </picture>
            </figure>
        </div>
        <div class="col-md-8 mt-md-5 pt-3 px-md-5">
            <h2><?= htmlspecialchars($listado->getTitulo());?></h2>
            <p><?= htmlspecialchars($listado->getDescripcion());?></p>
            <a href="index.php?p=listados" class="btn colorboton mb-5 mt-2">AGREGAR</a>
        </div>
    </article>
</section>
