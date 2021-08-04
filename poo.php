<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


abstract Class Persona
{
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;

    public function setDni($dni){$this->dni = $dni;}
    public function getDni(){return $this->dni;}
    
    public function setNombre($nombre){$this->nombre = $nombre;}
    public function getNombre(){return $this->nombre;}

    public function setEdad($edad){$this->edad = $edad;}
    public function getEdad(){return $this->edad;}


    public function setNacionalidad($nacionalidad){$this->nacionalidad = $nacionalidad;}
    public function getNacionalidad(){return $this->nacionalidad;}

    public function __construct()
    {
        $this->dni = 0;
        $this->nombre = "";
        $this->edad = 0;
        $this->nacionalidad =  "";
    }
    abstract public function imprimir();
}


class Alumno extends Persona
{
    public $legajo;
    public $notaPorfolio;
    public $notaPhp;
    public $notaProyecto;

    public function __construct()
    {
        $this->legajo = 0;
        $this->notaPorfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function calcularPromedio()
    {
        return ($this->notaPorfolio+$this->notaPhp+$this->notaProyecto)/3;
    }  

    public function imprimir()
    {
        echo "Nombre: ".$this->nombre."<br>";
        echo "Documento: ".$this->dni."<br>";
        echo "Legajo: ".$this->legajo."<br>";
        echo "Promedio:".$this->calcularPromedio()."<br>";
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

}


class Docente extends Persona
{
    public $especialidad;
    const ESPECILIADAD_WP = "Wordpress";
    const ESPECILIADAD_ECO = "Economía aplicada";
    const ESPECILIADAD_BBDD = "Base de datos";


    public function __construct()
    {   
        $this->especialidad = "";
        
    }

    public function imprimir()
    {
        echo "Docente: ".$this->nombre."<br>";
        echo "Dni: ".$this->dni."<br>";
        echo "especialidad: ".$this->especialidad."<br>";
    }
    public function imprimirEspecialidadesHabilidades(){}

}    

//progrma

$alumno1 = new Alumno();
$alumno1->setDni("30123654");
$alumno1->legajo = 1233643;
$alumno1->setNombre("Juan Paz");
$alumno1->setEdad(28);
echo "El Alumno ". $alumno1->getNombre()." tiene ". $alumno1->getEdad() . " años ";
$alumno1->imprimir();


$docente = new Docente();
$docente->setDni("1254639");
$docente->setNombre("Miguel Paz");
$docente->especialidad = Docente::ESPECILIADAD_BBDD;

$docente->imprimir();



?>