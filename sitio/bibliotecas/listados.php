<?php

/**
 * Obtiene todas las noticias.
 *
 * @return Listado[]
 */

function listadosTodas(): array {
    $filename       = __DIR__ . '/../data/listados.json';
    $json           = file_get_contents($filename);
    $listadosData   = json_decode($json, true);
    $salida = [];

    foreach($listadosData as $listado) {
        $listadoObj = new Listado;
        $listadoObj->loadDataFromArray($listado);
        $salida[] = $listadoObj;
    }

    return $salida;
}


function listadosTraerPorId(int $id): ?Listado {
    $listados = listadosTodas();

    foreach($listados as $listado) {
        if($listado->getListadoId() === $id) {
            return $listado;
        }
    }

    return null;
}
