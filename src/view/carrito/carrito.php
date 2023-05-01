<?php
session_start();

if (isset($_SESSION['carrito']) || isset($_POST['consola'])) {

    printf($_SESSION['carrito']);

    if (isset($_SESSION['carrito'])) {
        $carritoTotal = $_SESSION['carrito'];
        if (isset($_POST['consola'])) {
            $consola = $_POST['consola'];
            $precioMinimo = $_POST['precioMinimo'];
            $precioMaximo = $_POST['precioMaximo'];
            $descuento = $_POST['descuento'];
            $cantidad = $_POST['cantidad'];
            $donde = -1;
            if ($donde != -1) {
                $cuanto = $carritoTotal[$donde][$cantidad] + $cantidad;
                $carritoTotal[$donde] = array("consola" => $consola, "precioMinimo" => $precioMinimo, "precioMaximo" => $precioMaximo, "cantidad" => $cuanto, "descuento" => $descuento);
            } else {
                $carritoTotal[] = array("consola" => $consola, "precioMinimo" => $precioMinimo, "precioMaximo" => $precioMaximo, "cantidad" => $cantidad, "descuento" => $descuento);
            }
        }
    } else {
        $consola = $_POST['consola'];
        $precioMinimo = $_POST['precioMinimo'];
        $precioMaximo = $_POST['precioMaximo'];
        $descuento = $_POST['descuento'];
        $cantidad = $_POST['cantidad'];
        $carritoTotal[] = array("consola" => $consola, "precioMinimo" => $precioMinimo, "precioMaximo" => $precioMaximo, "cantidad" => $cuanto, "descuento" => $descuento);
    }

    $_SESSION['carrito'] = $carritoTotal;

}

header("Location: ".$_SERVER['HTTP_REFERER']."")

?>