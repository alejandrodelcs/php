<?php

Class Persona
{
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;

    public function __construct()
    {
        $this->dni = 0;
        $this->nombre = "";
        $this->edad = 0;
        $this->nacionalidad =  "";
    }
    public function imprimir(){}
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
     
}


class Docente extends Persona
{
    public $especialidad;

    public function __construct()
    {   
        $this->especialidad = "";
        
    }

    public function imprimir(){}
    public function imprimirEspecialidadesHabilidades(){}

}    

//progrma

$alumno1 = new Alumno();
$alumno1->nombre = "Juan Paz";
$alumno1->notaPorfolio = 8;
$alumno1->notaPhp = 9;
$alumno1->notaProyecto = 8.50;
$alumno1->legajo=992345;



$alumno2 = new Alumno();
$alumno2->nombre = "Micaela Ledesma";
$alumno2->notaPorfolio = 8;
$alumno2->notaPhp = 9;
$alumno2->notaProyecto = 9;
$alumno2->legajo=992005;

$alumno1->imprimir();
$alumno2->imprimir();


?>