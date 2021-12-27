<?php

class Listado
{
    /** @var int */
    protected $listado_id;

    /** @var string */
    protected $titulo;

    /** @var string */
    protected $descripcion;

    /** @var string */
    protected $imgPc;

    /** @var string */
    protected $imgTablet;

    /** @var string */
    protected $imgCelular;

    /** @var string */
    protected $imgMiniatura;

    /** @var string */
    protected $alt;

    /** @var string */
    protected $title;

    /** @var string */
    protected $precioTachado;

    /** @var string */
    protected $precio;

    /** @var string */
    protected $descuento;


    public function todo(): array 
    {
        $db = (new Conexion())->getConexion();
        $query = "SELECT * FROM listados";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        return $stmt->fetchAll();
    }



    /**
     *
     * @param int $pk
     * @return Listado|null
     */
    public function traerPorPk(int $pk): ?Listado 
    {
        $db = (new Conexion())->getConexion();
        $query = "SELECT * FROM listados
                  WHERE listado_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$pk]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $listado = $stmt->fetch();

        if (!$listado) {
            return null;
        }

        return $listado;
    }


    /**
     * Crea un registro en la base de datos.
     * En caso de ocurrir un error.
     * 
     *  @param array $data
     *  @throws PDOException
      */

    public function crear(array $data)
    {
        $db = (new Conexion())->getConexion();
        $query = "INSERT INTO listados (usuario_fk, titulo, descripcion, imgMiniatura)
                  VALUES (:usuario_fk, :titulo, :descripcion, :imgMiniatura)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'usuario_fk'            => $data['usuario_fk'],
            'titulo'                => $data['titulo'],
            'descripcion'           => $data['descripcion'],
            'imgMiniatura'          => $data['imgMiniatura'],
        ]);          
    }


    /**
     * Edita una noticia en la base de datos.
     *
     * @param $pk
     * @param array $data
     */
    public function editar($pk, array $data)
    {
        $db = (new Conexion())->getConexion();
        $query = "UPDATE listados
                SET titulo = :titulo,
                    descripcion = :descripcion,
                    imgMiniatura = :imgMiniatura
                WHERE listado_id = :listado_id";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'titulo'                => $data['titulo'],
            'descripcion'           => $data['descripcion'],
            'imgMiniatura'          => $data['imgMiniatura'],
            'listado_id'            => $pk,
        ]);
    }
    

    /**
     * Elimina el listado correspondiente a la $pk.
     *
     * @param int $pk
     */
    public function eliminar(int $pk) 
    {
        $db = (new Conexion())->getConexion();
        $query = "DELETE FROM listados
                  WHERE listado_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$pk]);

    }


    /**
     * Carga los datos del array $data en las propiedades equivalentes de la clase.
     *
     * @param array $data
     */

    public function loadDataFromArray(array $data): void
    {
        $this->setListadoId($data['listado_id']);
        $this->setTitulo($data['titulo']);
        $this->setDescripcion($data['descripcion']);
        $this->setImgMiniatura($data['imgMiniatura']);
    }

    /**
     * @return int
     */
    public function getListadoId(): int
    {
        return $this->listado_id;
    }

    /**
     * @param int $listado_id
     */
    public function setListadoId(int $listado_id): void
    {
        $this->listado_id = $listado_id;
    }

    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getImgPc(): string
    {
        return $this->imgPc;
    }

    /**
     * @param string $imgPc
     */
    public function setImgPc(string $imgPc): void
    {
        $this->imgPc = $imgPc;
    }

    /**
     * @return string
     */
    public function getImgTablet(): string
    {
        return $this->imgTablet;
    }

    /**
     * @param string $imgTablet
     */
    public function setImgTablet(string $imgTablet): void
    {
        $this->imgTablet = $imgTablet;
    }

    /**
     * @return string
     */
    public function getImgCelular(): string
    {
        return $this->imgCelular;
    }

    /**
     * @param string $imgCelular
     */
    public function setImgCelular(string $imgCelular): void
    {
        $this->imgCelular = $imgCelular;
    }

    /**
     * @return string
     */
    public function getImgMiniatura(): string
    {
        return $this->imgMiniatura;
    }

    /**
     * @param string $imgMiniatura
     */
    public function setImgMiniatura(string $imgMiniatura): void
    {
        $this->imgMiniatura = $imgMiniatura;
    }

    /**
     * @return string
     */
    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     */
    public function setAlt(string $alt): void
    {
        $this->alt = $alt;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPrecioTachado(): string
    {
        return $this->precioTachado;
    }

    /**
     * @param string $precioTachado
     */
    public function setPrecioTachado(string $precioTachado): void
    {
        $this->precioTachado = $precioTachado;
    }

    /**
     * @return string
     */
    public function getPrecio(): string
    {
        return $this->precio;
    }

    /**
     * @param string $precio
     */
    public function setPrecio(string $precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return string
     */
    public function getDescuento(): string
    {
        return $this->descuento;
    }

    /**
     * @param string $descuento
     */
    public function setDescuento(string $descuento): void
    {
        $this->descuento = $descuento;
    }
}
