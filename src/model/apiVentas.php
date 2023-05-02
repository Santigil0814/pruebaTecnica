<?php
require "../model/consolasModel/consolasModel.php";


class ApiVentas extends consolasModel
{
    public function totalDescuentos()
    {
        $sql = "SELECT * FROM ventas";
        $datos = mysqli_query($this->conexion, $sql);

        return $datos;
    }
}
$ventas = new ApiVentas();
$data = $ventas->totalDescuentos();


$baseURL = "http://localhost:8080/pruebaTecnica/";

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
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">

    <!-- styles -->
    <link rel="stylesheet" href="../../style.css">

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
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $baseURL ?>src/model/apiVentas.php" aria-current="page">Resumen<span class="visually-hidden">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-2">
        <h3 class="text-center">Detalles</h3>

        <div class="table-responsive table-bordered">
            <?php
            if (mysqli_num_rows($data) > 0) {


            ?>
                <table class="table table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre productos</th>
                            <th scope="col">Descuento de productos</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $granTotal = 0;
                        while ($datos = mysqli_fetch_assoc($data)) {
                        ?>
                            <tr class="">
                                <td><?php echo $datos['consola'] ?></td>
                                <td>$ <?php echo number_format($datos['descuentoAplicado']) ?></td>
                            </tr>
                            <?php $granTotal += $datos['descuentoAplicado'] ?>
                        <?php }
                        ?>
                        <tr>
                            <td>
                                <h4>Total descuentos</h4>
                            </td>
                            <td>
                                <h4>$ <?php echo number_format($granTotal) ?> </h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-primary text-center" role="alert">
                    <strong>No hay detalles para mostrar</strong>
                </div>

            <?php } ?>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>