<?php

class Usuario
{

    private $id_usuario;
    private $nombre;
    private $apellido;
    private $username;
    private $password;
    private $mail;
    private $fecha_nacimiento;
    private $sexo;
    private $lista_intereses;
    private $puntos;
    private $amigos;

    public function register(){

    }


    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

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

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of fecha_nacimiento
     */ 
    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set the value of fecha_nacimiento
     *
     * @return  self
     */ 
    public function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get the value of lista_intereses
     */ 
    public function getLista_intereses()
    {
        return $this->lista_intereses;
    }

    /**
     * Set the value of lista_intereses
     *
     * @return  self
     */ 
    public function setLista_intereses($lista_intereses)
    {
        $this->lista_intereses = $lista_intereses;

        return $this;
    }

    /**
     * Get the value of puntos
     */ 
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set the value of puntos
     *
     * @return  self
     */ 
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * Get the value of amigos
     */ 
    public function getAmigos()
    {
        return $this->amigos;
    }

    /**
     * Set the value of amigos
     *
     * @return  self
     */ 
    public function setAmigos($amigos)
    {
        $this->amigos = $amigos;

        return $this;
    }
}

?>