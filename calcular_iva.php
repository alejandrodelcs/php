<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


print_r($_POST);


$precioConIva =  0;
$precioSinIva = 0; //consumidor final
$ivaCantidad = 0;

if($_POST){
    if ($_REQUEST["txtIva"] != "") {
        $iva = $_REQUEST["txtIva"];
        $precioConIva =  ($_REQUEST["txtConIva"]) * (($iva / 100) + 1);
        $precioSinIva = ($_REQUEST["txtSinIva"]) / (($iva / 100) + 1); //consumidor final 
        $ivaCantidad = $precioConIva-$precioSinIva;
    }else{
        $iva = $_REQUEST["txtIva"];
        $precioConIva =  ($_REQUEST["txtConIva"]) * (($iva / 100) + 1);
        $precioSinIva = ($_REQUEST["txtSinIva"]) / (($iva / 100) + 1); //consumidor final 
        $ivaCantidad = $precioConIva-$precioSinIva;
    }    
}else{
        $precioConIva = 0;
        $precioSinIva = 0;
        $ivaCantidad =0;
}

?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="icon" href="images/calculadora.ico" type="image/ico" />
    <title>Calculadora de IVA</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center p-5">Calculadora de IVA</h1>
            </div>
            <div class="iva col-6 px-5">
                <form action="" method="POST">
                    <div>
                        <label for="txtIva">IVA(*) <input type="text" id="txtIva" class="form-control" name="txtIva" placeholder="21%" /></label>
                    </div>
                    <div class="py-5">
                        <label for="txtSinIva">Precio sin IVA<input type="text" id="txtSinIva" class="form-control" name="txtSinIva" placeholder="" /></label>
                    </div>
                    <div>
                        <label for="txtConIva">Precio con IVA <input type="text" id="txtConIva" class="form-control" name="txtConIva" placeholder="" /></label>
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-primary">Calcular</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <tbody>
                        <tr">
                            <td>IVA: <?php echo $iva?> </td>
                            </tr>
                            <tr>
                                <td>Precio sin IVA:<?php echo $precioConIva ?></td>
                            </tr>
                            <tr>
                                <td>Precio con IVA: <?php echo $precioSinIva ?> </td>
                            </tr>
                            <tr>
                                <td>IVA cantidad: <?php echo $ivaCantidad ?> </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>