<?php

function getRutasSitio(): array {

    return [
        'inicio' => [
            'title' => 'Página principal',
        ],
        'listados' => [
            'title' => 'Página listado',
        ],
        'listados-leer' => [
            'title' => 'Página detalles',
        ],
        'contacto' => [
            'title' => 'Página contacto',
        ],
        '404' => [
            'title' => 'Página no encontrada',
        ],
    ];
}
     
//Las rutas del panel de administración
/** @return array[]  */

function getRutasAdmin(): array {
    return [
        'inicio' => [
            'title' => 'Inicio',
            'autenticacion' => true,
        ],
        'login' => [
            'title' => 'Iniciar sesión',
        ],
        'listados' => [
            'title' => 'Administración de Listados',
            'autenticacion' => true,
        ],
        'listados-nuevo' => [
            'title' => 'Publicar Listado',
            'autenticacion' => true,
        ],
        'listados-editar' => [
            'title' => 'Editar Listado',
            'autenticacion' => true,
        ],
    ];
}

?>