<?php

header('content-type: aplication/json; charset=utf-8');

require "../../model/consolasModel/consolasModel.php";

$consolasModel = new consolasModel();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $respuesta = $consolasModel->getConsolas();
        echo json_encode($respuesta);
        break;

    case 'POST':
        $_POST = json_decode(file_get_contents('php://input', true));
        if (!isset($_POST->consola) || is_null($_POST->consola) || empty(trim($_POST->consola)) || strlen($_POST->consola) > 250) {
            $respuesta = ['Error', 'El NOMBRE de la consola no puede estar vacio y no debe superar los 250 caracteres'];
        } else if (!isset($_POST->precioMinimo) || is_null($_POST->precioMinimo) || empty(trim($_POST->precioMinimo)) || !is_numeric($_POST->precioMinimo)) {
            $respuesta = ['Error', 'El precio MÍNIMO no puede estar vacio y debe ser de tipo numérico'];
        } else if (!isset($_POST->descuento) || is_null($_POST->descuento) || empty(trim($_POST->descuento)) || !is_numeric($_POST->descuento)) {
            $respuesta = ['Error', 'El DESCUENTO no puede estar vacio y debe ser de tipo numérico'];
        } else {
            $respuesta = $consolasModel->postConsola($_POST->consola, $_POST->precioMinimo, $_POST->precioMaximo, $_POST->descuento);
        }
        echo json_encode($respuesta);
        break;

    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input', true));
        if (!isset($_PUT->id_consola) || is_null($_PUT->id_consola) || empty(trim($_PUT->id_consola))) {
            $respuesta = ['Error', 'El ID de la consola no puede estar vacio'];
        } else if (!isset($_PUT->consola) || is_null($_PUT->consola) || empty(trim($_PUT->consola)) || strlen($_PUT->consola) > 250) {
            $respuesta = ['Error', 'El NOMBRE de la consola no puede estar vacio y no debe superar los 250 caracteres'];
        } else if (!isset($_PUT->precioMinimo) || is_null($_PUT->precioMinimo) || empty(trim($_PUT->precioMinimo)) || !is_numeric($_PUT->precioMinimo)) {
            $respuesta = ['Error', 'El precio MÍNIMO no puede estar vacio y debe ser de tipo numérico'];
        } else if (!isset($_PUT->descuento) || is_null($_PUT->descuento) || empty(trim($_PUT->descuento)) || !is_numeric($_PUT->precioMinimo)) {
            $respuesta = ['Error', 'El DESCUENTTO no puede estar vacio y debe ser de tipo numérico'];
        } else {
            $respuesta = $consolasModel->putConsola($_PUT->id_consola, $_PUT->consola, $_PUT->precioMinimo, $_PUT->precioMaximo, $_PUT->descuento);
        }
        echo json_encode($respuesta);
        break;

    case 'DELETE':
        $_DELETE = json_decode(file_get_contents('php://input', true));
        if (!isset($_DELETE->id_consola) || is_null($_DELETE->id_consola) || empty(trim($_DELETE->id_consola))) {
            $respuesta = ['Error', 'El ID de la consola no puede estar vacio'];
        } else {
            $respuesta = $consolasModel->deleteConsola($_DELETE->id_consola);
        }
        echo json_encode($respuesta);
        break;
}
