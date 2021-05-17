<?php
$fecha = date("d/m/Y");
$nombre = "Alejandro Del Carpio Sanchez";
$edad = 28;
$aPeliculas = array("Volver al futuro", "El día despues de mañana");


?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <main class = "container">
        <div class = "row">
            <div class = "col-12 text-center py-5">
                <h1>Ficha Personal</h1>
            </div>
            <div class = "col-12">
                <table class = "table table-hover border">
                    <tbody>
                        <tr>
                            <tr>Fecha</tr>
                            <td><?php echo $fecha?></td>
                        </tr>
                        <tr>
                            <th>Nombre y Apellido</th>
                            <td><?php echo $nombre?></td>
                        </tr>
                        <tr>
                            <th>Edad</th>
                            <td><?php echo $edad?></td>
                        </tr>     
                        <tr>
                            <th>Peliculas Favoritas</th>
                            <td><?php echo $aPeliculas[0]?><br>
                                <?php echo $aPeliculas[1]?><br>
                            </td>    
                        </tr>    
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>