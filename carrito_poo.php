<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Argentina/Buenos_Aires");


class Cliente
{
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    //Constructor
    //PRE: - 
    //POST: crea un nuevo cliente 
    public function __construct()
    {
        $this->descuento = 0.0;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }


    //PRE: -
    //POST: imprime datos del nuevo cliente 
    public function imprimir()
    {
        echo "Cliente: " . $this->nombre . "<br>";
        echo "dni: " . $this->dni . "<br>";
        echo "correo: " . $this->correo . "<br>";
        echo "teléfono " . $this->telefono . "<br>";
        echo "descuento: " . $this->descuento . "<br>";
    }
}


class Producto
{

    private $cod;
    private $nombre;
    private $precio;
    private $iva;


    //Constructor
    //PRE: -
    //POST: crea nuevo producto
    public function __construct()
    {

        $this->precio = 0;
        $this->iva = 0.0;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }


    //PRE: -
    //POST: Muestra el nuevo producto
    public function imprimir()
    {
        echo "COD: " . $this->cod . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Precio: " . $this->precio . "<br>";
        echo "Descripcion: " . $this->descripcion . "<br>";
        echo "IVA: " . $this->iva . "<br>";
    }
}

class Carrito
{
    private $cliente; //es un objeto
    private $aProductos; //es un array de objetos
    private $subTotal;
    private $total;

    //PRE: - 
    //POST: Crea un carrito 
    public function __construct()
    {
        $this->aProductos = array();
        $this->subTotal = 0.0;
        $this->total = 0.0;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }


    //PRE:-
    //POST: añade un nuevo producto al carrito
    public function cargarProducto($producto)
    {
        $this->aProductos[] = $producto;
    }

    //PRE: - 
    //POST: muestra el carrito 
    public function imprimirTicket()
    {
        echo "<table class='table table-hover border'  style='width:400px'>";
        echo "<tr><th colspan='2' class='text-center'>Eco Market</th></tr>
                <tr>
                    <th>Fecha</th>
                    <td>" .date("d/m/Y") . "</td>
                </tr>
                <tr>
                    <th>DNI</th>
                    <td>" .$this->cliente->dni. "</td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>" .$this->cliente->nombre . "</td>
                </tr>
                </tr>
                <tr>
                    <th colspan='2'>Productos</th>
                </tr>";
                foreach($this->aProductos as $producto){
                    echo "<tr>
                            <td> ". $producto->nombre ."</td>
                            <td> ". number_format($producto->precio,2,",","."). " </td>
                        </tr>";
                    $this->subTotal += $producto->precio;
                    $this->total += $producto->precio*(($producto->iva / 100)+1);    
                }
                
        echo "<tr>
                <th>Subtotal S/IVA: </th>
                <td>" . number_format($this->subTotal,2,",",".") . "</td>
            </tr>
            <tr>
                <th>Total: </th>
                <td>" . number_format($this->total,2,",",".") . "</td>
            </tr>
        </table>";
    }
}

//Programa
$cliente1 = new Cliente();
$cliente1->dni = "34765456";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+54 11 8859-8686";
$cliente1->descuento = 0.05;

//$cliente1->imprimir();
//print_r($cliente1);

$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Notebook 15\" HP";
$producto1->descripcion = "Esta es una computadora HP";
$producto1->precio = 30800;
$producto1->iva = 10.5;


//$producto1->imprimir();
//print_r($producto1);

$producto2 = new Producto();
$producto2->cod = "QWR579";
$producto2->nombre = "Heladera Whirlpool";
$producto2->descripcion = "Esta es una heladera no froze";
$producto2->precio = 76000;
$producto2->iva = 21;

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Eco Market</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <?php $carrito->imprimirTicket();?>
            </div>
        </div>
    </main>
</body>

</html>