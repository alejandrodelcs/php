<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <title>Empleados</title>
</head>

<body>
    <?php include_once("funcionesEmpleado.php")?>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de Empleados</h1>
            </div>
            <div class="col-12">
                <table class="table table-hover border">
                    <tbody>
                        <tr>
                            <th>DNI</th>
                            <th>NOMBRE</th>
                            <th>SUELDO</th>
                        </tr>
                        <?php
                        print_r($aEmpleados);
                        foreach ($aEmpleados as $empleado) {
                        ?>
                            <tr>
                                <td><?php echo $empleado["dni"] ?></td>
                                <td><?php echo mb_strtoupper($empleado["nombre"]) ?></td>
                                <td><?php echo number_format(calcularNeto($empleado["bruto"]),2,",",".") ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    </main>

</body>

</html>