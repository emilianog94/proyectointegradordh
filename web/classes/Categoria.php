<?php 

class Categoria {
    private $nombre;
    private $id_categoria;


    public function obtenerCategoriaPorNombre($nombre){
        if($nombre == "diseno_y_programacion"){
            return 3;
        }

        if($nombre == "fotografia"){
            return 2;
        }

        if($nombre == "diseno_y_arte"){
            return 1;
        }
    }

    public function obtenerCategoriaPorId($id){
        if($id == 1){
            return "Diseño y Arte";
        }

        if($id == 2){
            return "Fotografia";
        }

        if($id == 3){
            return "Diseño y Programación";
        }
    }   
    

    public function getNombre(){
        return $this->nombre;
       }
      
       public function setNombre($nombre){
        $this->nombre = $nombre;
       }
      
       public function getId_categoria(){
        return $this->id_categoria;
       }
      
       public function setId_categoria($id_categoria){
        $this->id_categoria = $id_categoria;
       }
}


?>