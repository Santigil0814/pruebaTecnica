<?php
require "../../model/consolasModel/consolasModel.php";

$conexion = new consolasModel();

var_dump($conexion);

$precioEstandar = $_POST['precioEstandar'];
$precioMinimo = $_POST['precioMinimo'];
$precioMaximo = $_POST['precioMaximo'];

if (isset($_POST)) {
    $consola = $_POST['consola'];
    if ($consola == "PS4") {
        if ($precioMaximo == 0) {
            if ($precioEstandar > $precioMinimo) {
                $totalDescuento = $precioEstandar * 0.05;
                $conDescuento = $precioEstandar - $totalDescuento;
                $conexion->saveCarrito($consola, $precioEstandar, $conDescuento, $totalDescuento);
            } else {
                $conexion->saveCarrito($consola, $precioEstandar, $precioEstandar, $totalDescuento);
            }
        } else {
            if ($precioEstandar > $precioMinimo && $precioEstandar < $precioMaximo) {
                $totalDescuento = $precioEstandar * 0.05;
                $conDescuento = $precioEstandar - $totalDescuento;
                $conexion->saveCarrito($consola, $precioEstandar, $conDescuento, $totalDescuento);
            } else {
                $conexion->saveCarrito($consola, $precioEstandar, $precioEstandar, $totalDescuento);
            }
        }
    } else if ($consola == "XBOX") {
        if ($precioMaximo == 0) {
            if ($precioEstandar > $precioMinimo) {
                $totalDescuento = $precioEstandar * 0.07;
                $conDescuento = $precioEstandar - $totalDescuento;
                $conexion->saveCarrito($consola, $precioEstandar, $conDescuento, $totalDescuento);
            } else {
                $conexion->saveCarrito($consola, $precioEstandar, $precioEstandar, $totalDescuento);
            }
        } else {
            if ($precioEstandar > $precioMinimo && $precioEstandar < $precioMaximo) {
                $totalDescuento = $precioEstandar * 0.07;
                $conDescuento = $precioEstandar - $totalDescuento;
                $conexion->saveCarrito($consola, $precioEstandar, $conDescuento, $totalDescuento);
            } else {
                $conexion->saveCarrito($consola, $precioEstandar, $precioEstandar, $totalDescuento);
            }
        }
    } else if ($consola == "PC") {
        if ($precioMaximo == 0) {
            if ($precioEstandar > $precioMinimo) {
                $totalDescuento = $precioEstandar * 0.15;
                $conDescuento = $precioEstandar - $totalDescuento;
                $conexion->saveCarrito($consola, $precioEstandar, $conDescuento, $totalDescuento);
            } else {
                $conexion->saveCarrito($consola, $precioEstandar, $precioEstandar, $totalDescuento);
            }
        } else {
            if ($precioEstandar > $precioMinimo && $precioEstandar < $precioMaximo) {
                $totalDescuento = $precioEstandar * 0.15;
                $conDescuento = $precioEstandar - $totalDescuento;
                $conexion->saveCarrito($consola, $precioEstandar, $conDescuento, $totalDescuento);
            } else {
                $conexion->saveCarrito($consola, $precioEstandar, $precioEstandar, $totalDescuento);
            }
        }
    } else if ($consola == "Otra") {
        if ($precioMaximo == 0) {
            if ($precioEstandar > $precioMinimo) {
                $totalDescuento = $precioEstandar * 0.1;
                $conDescuento = $precioEstandar - $totalDescuento;
                $conexion->saveCarrito($consola, $precioEstandar, $conDescuento, $totalDescuento);
            } else {
                $conexion->saveCarrito($consola, $precioEstandar, $precioEstandar, $totalDescuento);
            }
        } else {
            if ($precioEstandar > $precioMinimo && $precioEstandar < $precioMaximo) {
                $totalDescuento = $precioEstandar * 0.1;
                $conDescuento = $precioEstandar - $totalDescuento;
                $conexion->saveCarrito($consola, $precioEstandar, $conDescuento, $totalDescuento);
            } else {
                $conexion->saveCarrito($consola, $precioEstandar, $precioEstandar, $totalDescuento);
            }
        }
    }
}
