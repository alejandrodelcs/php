<?php

class Usuario{
    private $idusuario;
    private $nombre;
    private $correo;
    private $clave;
    private $confirmado;
    private $codigo;
    
  

    public function __construct(){

    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
        return $this;
    }

    public function cargarFormulario($request){
        $this->idusuario = isset($request["id"])? $request["id"] : "";
        $this->nombre = isset($request["txtNombre"])? $request["txtNombre"] : "";
        $this->correo = isset($request["txtCorreo"])? $request["txtCorreo"]: "";
        $this->clave = isset($request["txtClave"]) && $request["txtClave"] != "" ? $this->encriptarClave($request["txtClave"]) : "";
    }

    public function insertar(){
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        //Arma la query
        $sql = "INSERT INTO usuarios (
                    nombre, 
                    correo,
                    clave, 
                    confirmado,
                    codigo
                ) VALUES (
                    '" . $mysqli->real_escape_string($this->nombre) ."', 
                    '" . $mysqli->real_escape_string($this->correo) ."', 
                    '" . $mysqli->real_escape_string($this->clave) ."',
                    '" . $mysqli->real_escape_string($this->confirmado) ."',
                    '" . $mysqli->real_escape_string($this->codigo) ."'
                );";
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idusuario = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }


    public function validar(){
         //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);

        $sql = "SELECT codigo,correo,confirmado FROM usuarios 
                WHERE codigo ='" . $this->codigo . "'AND correo ='" . $this->correo."'AND confirmado=" . $this->confirmado;

        //Ejecuta la query
        if (!$result = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        return $result->num_rows;

        //Cierra la conexión
        $mysqli->close();
    }



    public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "SELECT idusuario, nombre, correo, clave, confirmado, codigo FROM usuarios";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if($resultado){
            //Convierte el resultado en un array asociativo
            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new Usuario();
                $entidadAux->idusuario = $fila["idusuario"];
                $entidadAux->nombre = $fila["nombre"];
                $entidadAux->correo = $fila["correo"];
                $entidadAux->clave = $fila["clave"];
                $entidadAux->confirmado = $fila["confirmado"];
                $entidadAux->codigo = $fila["codigo"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    }




    public function confirmarUsuario(){

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "UPDATE usuarios SET confirmado='1'
                WHERE codigo= '" .$this->codigo. " ' AND correo='" . $this->correo. "' AND confirmado='0'";

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }


        $mysqli->close();
    }



    public function encriptarClave($clave){
        $claveEncriptada = password_hash($clave, PASSWORD_DEFAULT);
        return $claveEncriptada;
    }

    public function verificarClave($claveIngresada, $claveEnBBDD){
        return password_verify($claveIngresada, $claveEnBBDD);
    }

    function generarCodigoAlfanumerico() {
        $maxCaracteres = 32;
        $caracteresPermitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($caracteresPermitidos);
        $random_string = '';
        for($i = 0; $i < $maxCaracteres; $i++) {
            $caracteres_random = $caracteresPermitidos[mt_rand(0, $input_length - 1)];
            $random_string .= $caracteres_random;
        }
     
        $this->codigo = $random_string;
    }
     

}
?>
