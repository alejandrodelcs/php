<?php


class Provincia{
    private $idprovincia;
    private $nombre;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }

    public function obtenerTodos(){

        $mysqli = new mysqli(Config::BBDD_HOST,Config::BBDD_USUARIO,Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "SELECT idprovincia,
                        nombre
                FROM provincias 
                ORDER BY nombre ASC";

        if (!$resultado = $mysqli->query($sql)){
            printf("Error en query: %s\n",$mysqli->error." ". $sql);
        }

        $aProvincias = array();;
        
        if($resultado){

            while ($fila = $resultado->fetch_assoc()){
                $entidadAux = new Provincia();
                $entidadAux->idprovincia = $fila["idprovincia"];
                $entidadAux->nombre = $fila["nombre"];
                $aProvincias[] = $entidadAux;
            }
            return $aProvincias;
        }
        $mysqli->close();
        
    }  
}

?>
