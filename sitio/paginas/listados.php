<?php
    $listado = new Listado();
    $listados = $listado->todo();
?>



<main class="container-fluid my-5 px-4 pb-5">
    <h2 class="h1 text-center mb-5">Nuestra selección</h2>
    <section class="row d-flex justify-content-center">
        <?php foreach($listados as $listado): ?>
        <article class="col-3 fondoblancoinstr px-3 mx-md-2 mt-3">
            <figure class="d-flex justify-content-center">
                <picture>
                    <source media="(max-width: 599px)" srcset="imagenes/<?= htmlspecialchars($listado->getImgCelular());?>">
                    <source media="(max-width: 800px)" srcset="imagenes/<?= htmlspecialchars($listado->getImgTablet());?>">    
                    <img src="imagenes/<?= htmlspecialchars($listado->getImgPc());?>" alt="<?= htmlspecialchars($listado->getAlt());?>" title="<?= htmlspecialchars($listado->getTitle());?>" class="img-fluid imgradius mt-4" />
                </picture>
            </figure>
            <div class="card-body">
                <h3 class="card-title"><?= htmlspecialchars($listado->getTitulo());?></h3>
                <p class="stars">Estrellas</p>
                    <p class="card-text tachado mb-0 ml-2"><small class="text-muted"><?= htmlspecialchars($listado->getPrecioTachado());?></small></p>
                    <div class="d-flex justify-content-start mb-0">
                        <p class="card-text tamañotxt ml-2 mr-4"><?= htmlspecialchars($listado->getPrecio());?></p>
                        <p class="card-text colorprecio mt-1"><?= htmlspecialchars($listado->getDescuento());?></p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <figure>
                            <img src="imagenes/deliverydos.svg" class="envio mr-4 ml-0" alt="delivery" />
                        </figure>
                        <p class="colorprecio mt-3">ENVÍO GRATIS</p>
                    </div>
                    <button type="button" class="btn colorboton w-100 mb-2" data-toggle="modal" data-target="#staticBackdrop">AGREGAR AL CARRITO</button>
                    
                    <a href="index.php?p=listados-leer&id=<?= $listado->getListadoId();?>" class="btn btn-outline btnborde w-100 my-1">VER DETALLE</a>
            </div>
        </article>
        <?php endforeach; ?>
    </section>
</main>





