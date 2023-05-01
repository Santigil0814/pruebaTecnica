<?php
$baseURL = "http://localhost:8080/pruebaTecnica/";

if (isset($_SESSION['carrito'])) {
    $carritoTotal = $_SESSION['carrito'];
}

if (isset($_SESSION['carrito'])) {
    for ($i = 0; $i <= count($carritoTotal) - 1; $i++) {
        if (isset($carritoTotal[$i])) {
            if ($carritoTotal[$i] != NULL) {
                if (isset($carritoTotal['cantidad'])) {
                    $carritoTotal['cantidad'] - '0';
                } else {
                    $carritoTotal['cantidad'] = $carritoTotal['cantidad'];
                }
                $totalCantidad = $carritoTotal['cantidad'];
                $total_Cantidad++;
                if (!isset($totalCantidad)) {
                    $totalCantidad = '0';
                } else {
                    $totalCantidad = $totalCantidad;
                }
                $totalCantidad += $total_Cantidad;
            }
        }
    }
}

if (!isset($totalCantidad)) {
    $totalCantidad = '';
} else {
    $totalCantidad = $totalCantidad;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Prueba Técnica | Santiago Gil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon -->
    <script src="https://kit.fontawesome.com/bdb35a6439.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- styles -->
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $baseURL ?>index.php">
                <i class="fa-solid fa-gamepad nav-logo"></i>
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $baseURL ?>index.php" aria-current="page">Inicio<span class="visually-hidden">(current)</span></a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $baseURL ?>src/view/consolas/agregarConsola.php" aria-current="page">Agregar consola<span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $baseURL ?>src/view/consolas/agregarConsola.php" aria-current="page">Resumen<span class="visually-hidden">(current)</span></a>
                    </li> -->
                </ul>
            </div>
            <!-- <a class="nav-link active" href="<?php echo $baseURL ?>index.php" aria-current="page">Carrito<span class="visually-hidden">(current)</span></a> -->
            <button type="button" class="btn-car" data-bs-toggle="modal" data-bs-target="#modalId">
                Carrito <?php echo $totalCantidad; ?>
            </button>
        </div>
    </nav>

    <main class="content mx-4 my-1">

        <!-- Modal Carrito -->
        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-x" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Factura</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <?php
                            include("/xampp/htdocs/pruebaTecnica/src/view/carrito/comprar.php");
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar factura</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Js modal -->
        <script>
            const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
        </script>