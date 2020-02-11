<?php

class Desafio implements Interactible
{
    private $id_desafio;
    private $fecha_creacion;
    private $fecha_limite;
    private $imagen;
    private $descripcion;
    private $id_respuesta_ganadora;
    private $id_categoria;
    private $id_autor;
    private $dificultad;
    private $requisitos;
    private $nombre;


    /*CREATE, REMOVE, SEARCH BY ID, LIST ALL, UPDATE */
    public function eliminarDesafio($id): bool
    {
        $link = Conexion::conectar();
        $consulta_sql = 'DELETE FROM desafios WHERE id_desafio= :id_desafio_seleccionado';
        $desafio_a_eliminar = $link->prepare($consulta_sql);
        $desafio_a_eliminar->bindValue(":id_desafio_seleccionado", $id);
        $desafio_a_eliminar->execute();
        return true;
    }

    public function actualizarDesafio($id)
    {
        $errores = Desafio::validarCampos();
        if (!$errores) {
            $link = Conexion::conectar();
            $consulta_sql = 'UPDATE desafios 
            SET nombre = :nombre
            SET imagen = :imagen
            SET id_categoria = :id_categoria
            SET descripcion = :descripcion
            SET requisitos = :requisitos
            SET dificultad = :dificultad
            SET fecha_limite = :fecha_limite
            WHERE id_desafio = :id_desafio';
            $desafio = $link->prepare($consulta_sql);
            $desafio->bindValue(":nombre", $this->getNombre());
            $desafio->bindValue(":imagen", $this->getImagen());
            $desafio->bindValue(":id_categoria", $this->getId_categoria());
            $desafio->bindValue(":descripcion", $this->getDescripcion());
            $desafio->bindValue(":requisitos", $this->getRequisitos());
            $desafio->bindValue(":dificultad", $this->getDificultad());
            $desafio->bindValue(":fecha_limite", $this->getFecha_limite());
            $desafio->bindValue(":id_desafio", $this->getId_desafio());
            $desafio->execute();
            return true;
        }
    }

    public function listarDesafios()
    {
        $link = Conexion::conectar();
        $consula_sql = 'SELECT fecha_creacion,fecha_limite,imagen,id_respuesta_ganadora,id_categoria, id_autor, id_dificultad, requisitos FROM desafios 
        INNER JOIN respuestas 
            ON desafios.id_respuesta_ganadora = respuestas.id_respuesta
        INNER JOIN categorias 
            ON desafios.id_categorias = categorias.id_categoria
        INNER JOIN usuarios 
            ON desafios.id_autor = usuarios.id_usuario';

        $desafios = $link->prepare($consula_sql);
        $desafios->execute();
        return $desafios->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id)
    {
        $link = Conexion::conectar();
        $consulta_sql = "SELECT fecha_creacion,fecha_limite,imagen,id_respuesta_ganadora,id_categoria, id_autor, id_dificultad, requisitos FROM desafios WHERE desafios.id = $id";
        $desafios = $link->prepare($consulta_sql);
        $desafios->execute();
        return $desafios->fetch(PDO::FETCH_ASSOC);
    }

    public function guardarEnDB(): bool
    {
        $link = Conexion::conectar();
        $link->beginTransaction();

        try {
            $consulta_sql = "INSERT INTO desafios VALUES (default, :nombre , :fecha_creacion , :fecha_limite , :imagen , :descripcion , :id_respuesta_ganadora , :id_categoria , id_autor , :dificultad , :requisitos)";
            $nuevo_desafio = $link->prepare($consulta_sql);
            $nuevo_desafio->bindValue(":nombre", $this->getNombre());
            $nuevo_desafio->bindValue(":fecha_creacion", $this->getFecha_creacion());
            $nuevo_desafio->bindValue(":fecha_limite", $this->getFecha_limite());
            $nuevo_desafio->bindValue(":imagen", $this->getImagen());
            $nuevo_desafio->bindValue(":descripcion", $this->getDescripcion());
            $nuevo_desafio->bindValue(":id_respuesta_ganadora", $this->getId_respuesta_ganadora());
            $nuevo_desafio->bindValue(":id_categoria", $this->getId_categoria());
            $nuevo_desafio->bindValue(":id_autor", $this->getId_autor());
            $nuevo_desafio->bindValue(":dificultad", $this->getDificultad());
            $nuevo_desafio->bindValue(":requisitos", $this->getRequisitos());
            $nuevo_desafio->execute();
            $link->commit();
        } catch (PDOException $e) {
            $link->rollBack();
            return false;
        }

        return true;
    }


    /*Vamos a validar los campos ingresados por el usuario*/
    public function validarCampos()
    {
        if ($_POST) {
            if (isset($_POST)) {
                $errores = [];
                /*Validar campo name no puede ser mayor a 60caracteres*/
                if (strlen($_POST['name']) > 60 || strlen($_POST['name']) < 10) {
                    $errores['name'] = "El campo debe tener entre 10 y 60 caracteres";
                }

                /*Para la imagen no puede ser mayor a 1000x1000px y no debe pesar mas de 25MB y debe ser si o si PNG JPG O JPEG*/
                define('KB', 1024);
                define('MB', 1048576);
                define('GB', 1073741824);
                define('TB', 1099511627776);

                $foto_desafio = $_FILES['foto-desafio'];
                $ext = strtolower(pathinfo($foto_desafio['name'], PATHINFO_EXTENSION));
                if ($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png') {
                    $errores['foto-desafio'] = "La extensión del archivo debe ser jpg, png ó jpeg";
                } elseif ($foto_desafio['size'] > 25 * MB) {
                    $errores['foto-desafio'] == "El archivo es demasiado pesado, maximo 25MB";
                }

                /*Debe almenos seleccionar una categoria*/
                if (!isset($_POST['diseno_y_arte']) || !isset($_POST['fotografia']) || !isset($_POST['programacion_y_logica'])) {
                    $errores['categoria'] = "Debe al menos seleccionar una categoria";
                }
            }
        }

        return $errores;
    }

    /**
     * Get the value of id_desafio
     */
    public function getId_desafio()
    {
        return $this->id_desafio;
    }

    /**
     * Set the value of id_desafio
     *
     * @return  self
     */
    public function setId_desafio($id_desafio)
    {
        $this->id_desafio = $id_desafio;

        return $this;
    }

    /**
     * Get the value of fecha_creacion
     */
    public function getFecha_creacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * Set the value of fecha_creacion
     *
     * @return  self
     */
    public function setFecha_creacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }

    /**
     * Get the value of fecha_limite
     */
    public function getFecha_limite()
    {
        return $this->fecha_limite;
    }

    /**
     * Set the value of fecha_limite
     *
     * @return  self
     */
    public function setFecha_limite($fecha_limite)
    {
        $this->fecha_limite = $fecha_limite;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of id_respuesta_ganadora
     */
    public function getId_respuesta_ganadora()
    {
        return $this->id_respuesta_ganadora;
    }

    /**
     * Set the value of id_respuesta_ganadora
     *
     * @return  self
     */
    public function setId_respuesta_ganadora($id_respuesta_ganadora)
    {
        $this->id_respuesta_ganadora = $id_respuesta_ganadora;

        return $this;
    }

    /**
     * Get the value of id_categoria
     */
    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    /**
     * Set the value of id_categoria
     *
     * @return  self
     */
    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

        return $this;
    }

    /**
     * Get the value of id_autor
     */
    public function getId_autor()
    {
        return $this->id_autor;
    }

    /**
     * Set the value of id_autor
     *
     * @return  self
     */
    public function setId_autor($id_autor)
    {
        $this->id_autor = $id_autor;

        return $this;
    }

    /**
     * Get the value of dificultad
     */
    public function getDificultad()
    {
        return $this->dificultad;
    }

    /**
     * Set the value of dificultad
     *
     * @return  self
     */
    public function setDificultad($dificultad)
    {
        $this->dificultad = $dificultad;

        return $this;
    }

    /**
     * Get the value of requisitos
     */
    public function getRequisitos()
    {
        return $this->requisitos;
    }

    /**
     * Set the value of requisitos
     *
     * @return  self
     */
    public function setRequisitos($requisitos)
    {
        $this->requisitos = $requisitos;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}
