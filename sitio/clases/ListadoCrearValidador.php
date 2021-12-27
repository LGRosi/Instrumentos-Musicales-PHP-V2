<?php

class ListadoCrearValidador
{
    /** @var array 
    * Los datos a validar.
    */
    protected $data = [];


     /** @var array  
    * Los errores ocurridos en la validación.
    */ 
     protected $errores = [];


    /** @param array $data 
    * Los datos a validar.
    */ 
    public function __construct(array $data)
    {
        $this->data = $data;
    }


    /** Ejecuta las validaciones */
    public function ejecutar()
    {
        //Validar Título:
        if(empty($this->data['titulo'])) {
            $this->errores['titulo'] = 'Tenés que escribir un título';
        } else if(strlen($this->data['titulo']) < 3) {
            $this->errores['titulo'] = 'El título tiene que tener al menos 3 caracteres.';
        }

        //Validar Descripción:
        if(empty($this->data['descripcion'])) {
            $this->errores['descripcion'] = 'Tenés que escribir una descripción';
        } else if(strlen($this->data['descripcion']) < 10) {
            $this->errores['descripcion'] = 'La descripción tiene que tener al menos 10 caracteres.';
        }
    }


    /**
     * Si hay errores de validación.
     * @return bool
     */
    public function hasErrors(): bool
    {
        return count($this->errores) > 0;
    }


    /** @return array */ 
    public function getErrores(): array
    {
        return $this->errores;
    }

}