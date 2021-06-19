<?php
$aAlumnos = array();
$Alumnos[] = array("nombre" => "Juan Perez", "nota_1" => 8, "nota_2" => 5);
$Alumnos[] = array("nombre" => "María Mendoza", "nota_1" => 4, "nota_2" => 2);
$Alumnos[] = array("nombre" => "Julieta Riquelme", "nota_1" => 10, "nota_2" => 2);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>actas</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Actas</h1>
            </div>
            <div class="col-12">
                <table class="table table-hover border">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Alumno</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Promedio</th>
                        </tr>
                        <?php
                        $pos = 0;
                        $promedio = 0;
                        foreach ($aAlumnos as $alumno) :
                            $pos++;
                            $promedio = ($alumno["nota_1"] + $alumno["nota_2"]) / 2; ?>
                            <tr>
                                <td><?php echo $pos; ?></td>
                                <td><?php echo $alumno["nombre"]; ?></td>
                                <td><?php echo $alumno["nota_1"]; ?></td>
                                <td><?php echo $alumno["nota_2"]; ?></td>
                                <td><?php echo $promedio; ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>