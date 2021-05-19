<?php
//Definicion de paciente

$aPacientes =  array();

$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Zoila Vaca",
    "edad" => 45,
    "peso" => 81.50
);

$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79
);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Listado de pacientes</h1>
            </div>
            <div class="col-12">
                <table class = "table table-hover border">
                    <tbody>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre y Apellido</th>
                            <th>Edad</th>
                            <th>Peso</th>
                        </tr>
                        <?php 
                            foreach($aPacientes as $paciente){
                        ?>        
                                <tr>
                                    <td><?php echo $paciente["nombre"]?> </td>
                                    <td><?php echo $paciente["dni"]?> </td>
                                    <td><?php echo $paciente["edad"]?> </td>
                                    <td><?php echo $paciente["peso"]?> </td>
                                </tr>    
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </main>
</body>
</html>