<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Clase
{
    private $nombre;
    private $entrenador;
    private $aAlumnos;

    public function __construct()
    {
        $this->aAlumnos = array();
    }

    public function asignarEntrenador($entrenador)
    {
        $this->entrenador = $entrenador;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
    public function inscribirAlumno($alumno)
    {
        $this->aAlumnos[] = $alumno;
    }


    public function imprimirListado()
    {   
        echo "<table class='table table-hover border'>";
        echo "<tr><th colspan='2' class=''>Gimnasio</th></tr>";
        foreach ($this->aAlumnos as $alumno) {
            echo "<tr>
                    <th>Apellidos y Nombres: </th>
                    <td>". $alumno->nombre ."</td>
                </tr>
                <tr>
                    <th>DNI: </th>
                    <td>". $alumno->dni . "</td>
                </tr>
                <tr>
                    <th>Correo: </th>
                    <td>". $alumno->correo . "</td>
                </tr>
                <tr>
                    <th>Celular: </th>
                    <td>". $alumno->celular . "</td>
                </tr>
                <tr>
                    <th>Fecha de Nacimiento: </th>
                    <td>" . $alumno->fechaNac ."</td>
                </tr>"; 
        }
        echo "</table>";
        
    }
    
}


class Persona
{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __construct($dni, $nombre, $correo, $celular)
    {
        $this->dni =  $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->celular = $celular;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
}


class Alumno extends Persona
{
    private $fechaNac;
    private $peso;
    private $altura;
    private $bAptoFisico;
    private $presentismo;


    public function __construct($dni, $nombre, $celular, $correo, $fechaNac)
    {
        parent::__construct($dni, $nombre, $correo, $celular);
        $this->fechaNac = $fechaNac;
        $this->peso = 0.0;
        $this->altura = 0.0;
        $this->aptoFisico = false;
        $this->presentismo = 0.0;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function setFichaMedica($peso, $altura, $bAptoFisico)
    {
        $this->peso = $peso;
        $this->altura = $altura;
        $this->bAptoFisico = $bAptoFisico;
    }
}

class Entrenador extends Persona
{
    private $aClases;


    public function __construct($dni, $nombre, $correo, $celular)
    {
        parent::__construct($dni, $nombre, $correo, $celular);
        $this->aClases = array();
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
}

//Desarrollo del programa
$entrenador1 = new Entrenador("34987789", "Miguel Ocampo", "miguel@mail.com", "11678634");
$entrenador2 = new Entrenador("28987589", "Andrea Zarate", "andrea@mail.com", "11768654");

$alumno1 = new Alumno("40787657", "Dante Montera", "dante@mail.com", "1145632457", "1997-08-28");
$alumno1->setFichaMedica(90, 178, true);
$alumno1->presentismo = 78;

$alumno2 = new Alumno("46766547", "Darío Turchi", "dante@mail.com", "1145632457", "1986-11-21");
$alumno2->setFichaMedica(73, 1.68, false);
$alumno2->presentismo = 68;

$alumno3 = new Alumno("23691025", "Mario Flores", "flowers@mail.com", "1132123652", "1999-01-21");
$alumno3->setFichaMedica(73, 1.68, false);
$alumno3->presentismo = 68;


$alumno4 = new Alumno("46213641", "Rocio Mejia", "rocioMejia@mail.com", "1136245897", "2005-02-16");
$alumno4->setFichaMedica(73, 1.68, false);
$alumno4->presentismo = 68;

$clase1 = new Clase();
$clase1->nombre = "Funcional";
$clase1->asignarEntrenador($entrenador1);
$clase1->inscribirAlumno($alumno1);
$clase1->inscribirAlumno($alumno3);
$clase1->inscribirAlumno($alumno4);

$clase2 = new Clase();
$clase2->nombre = "Zumba";
$clase2->asignarEntrenador($entrenador2);
$clase2->inscribirAlumno($alumno1);
$clase2->inscribirAlumno($alumno2);
$clase2->inscribirAlumno($alumno3);


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Gimnasio</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <?php $clase1->imprimirListado();?>
            </div>
        </div>
    </main>

</body>

</html>