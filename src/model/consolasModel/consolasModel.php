<?php

class consolasModel
{
    public $conexion;
    public function __construct()
    {
        $this->conexion = new mysqli('localhost', 'root', '', 'pruebatecnica');
        mysqli_set_charset($this->conexion, 'utf8');
    }

    public function getConsolas($id_consola = NULL)
    {
        $where = ($id_consola === NULL) ? "" : "WHERE id_consola='$id_consola'";
        $consolas = [];
        $sql = "SELECT * FROM consolas " . $where;
        print_r($id_consola);
        $datos = mysqli_query($this->conexion, $sql);
        while ($row = mysqli_fetch_assoc($datos)) {
            array_push($consolas, $row);
        };
        return $consolas;
    }

    public function getCarrito()
    {
        $sql = "SELECT * FROM carrito";
        $datos = mysqli_query($this->conexion, $sql);
        return $datos;
    }

    public function saveCarrito($consola, $precio, $descuento, $totalDescuento)
    {
        $sql = "INSERT INTO `carrito` (`idCarrito`, `nombre`, `precio`, `precioDescuento`, `descuento`) VALUES (NULL, '$consola', '$precio', '$descuento', '$totalDescuento');";
        mysqli_query($this->conexion, $sql);
        return header("location: ../../../index.php");
    }

    public function saveVenta($consola, $descuento)
    {
        $sql = "INSERT INTO `ventas` (`id`, `consola`, `descuentoAplicado`) VALUES (NULL, '$consola', '$descuento');";
        mysqli_query($this->conexion, $sql);
    }

    public function deleteCarrito()
    {
        $sql = "DELETE FROM carrito";
        mysqli_query($this->conexion, $sql);
    }

    public function postConsola($consola, $precioMinimo, $precioMaximo, $descuento)
    {
        $valida = $this->existeConsola($consola, $precioMinimo, $precioMaximo, $descuento);
        $resultado = ['Error', 'Ya existe el producto con las mismas caracteristicas'];
        if (count($valida) == 0) {
            $sql = "INSERT INTO consolas (consola,precioMinimo,precioMaximo,descuento) VALUES ('$consola','$precioMinimo','$precioMaximo','$descuento')";
            mysqli_query($this->conexion, $sql);
            $resultado = ['success', 'Consola guardada'];
        }
        return $resultado;
    }

    public function putConsola($id_consola, $consola, $precioMinimo, $precioMaximo, $descuento)
    {
        $existe = $this->getConsolas($id_consola);
        $resultado = ['Error', 'No existe la consola con número de ID ' . $id_consola];
        if (count($existe) > 0) {
            $valida = $this->existeConsola($consola, $precioMinimo, $precioMaximo, $descuento);
            $resultado = ['Error', 'Ya existe el producto con las mismas caracteristicas'];
            if (count($valida) == 0) {
                $sql = "UPDATE consolas SET consola='$consola',precioMinimo='$precioMinimo',precioMaximo='$precioMaximo',descuento='$descuento' WHERE id_consola='$id_consola'";
                mysqli_query($this->conexion, $sql);
                $resultado = ['success', 'Consola actualizada'];
            }
        }
        return $resultado;
    }

    public function deleteConsola($id_consola)
    {
        $valida = $this->getConsolas($id_consola);
        $resultado = ['Error', 'No existe el producto con número de ID ' . $id_consola];
        if (count($valida) > 0) {
            $sql = "DELETE FROM consolas WHERE id_consola='$id_consola'";
            mysqli_query($this->conexion, $sql);
            $resultado = ['success', 'Consola eliminada'];
        }
        return $resultado;
    }

    public function existeConsola($consola, $precioMinimo, $precioMaximo, $descuento)
    {
        $consolas = [];
        $sql = "SELECT * FROM consolas WHERE consola='$consola' AND precioMinimo='$precioMinimo' AND precioMaximo='$precioMaximo' AND descuento='$descuento' ";
        $datos = mysqli_query($this->conexion, $sql);
        while ($row = mysqli_fetch_assoc($datos)) {
            array_push($consolas, $row);
        };
        return $consolas;
    }

}
