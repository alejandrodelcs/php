<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000,
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000,
);


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Lista de Productos</h1>
            </div>
            <div class="col-12">
                <table class="table table-hover border">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                        <?php $posicion = 0;
                        $contadorPrecio = 0;
                        while ($posicion < count($aProductos)) {
                        ?>
                            <tr>
                                <td><?php echo $aProductos[$posicion]["nombre"] ?></td>
                                <td><?php echo $aProductos[$posicion]["marca"] ?></td>
                                <td><?php echo $aProductos[$posicion]["modelo"] ?></td>
                                <td><?php echo $aProductos[$posicion]["stock"] == 0 ? "No hay Stock" : ($aProductos[$posicion]["stock"] > 10 ? "Hay stock" : "Poco Stock") ?></td>
                                <td><?php echo $aProductos[$posicion]["precio"] ?></td>
                                <td><a class="btn btn-primary" href="#" role="button">Comprar</a></td>
                            </tr>
                        <?php
                            $contadorPrecio += $aProductos[$posicion]["precio"];
                            $posicion++;
                        } ?>
                    </tbody>
                </table>
                <h2> El Subtotal: $ <?php echo $contadorPrecio; ?> </h2>
            </div>
    </main>
</body>

</html>