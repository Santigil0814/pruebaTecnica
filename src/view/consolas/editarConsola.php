<?php
include("../public/navbar.php")
?>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<div class="card mx-5 my-2">
    <div class="card-header">
        Datos consola
    </div>
    <div class="card-body">

        <form action="" method="post">

            <div class="mb-3">
                <label for="consola" class="form-label">Nombre equipo</label>
                <input type="text" class="form-control" name="consola" id="consola" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="precioMinimo" class="form-label">Precio mínimo</label>
                <input type="text" class="form-control" name="precioMinimo" id="precioMinimo" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="precioMaximo" class="form-label">Precio máximo</label>
                <input type="text" class="form-control" name="precioMaximo" id="precioMaximo" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="descuento" class="form-label">Descuento</label>
                <input type="text" class="form-control" name="descuento" id="descuento" aria-describedby="helpId" placeholder="">
            </div>

        </form>
    </div>
    <div class="card-footer text-end">
        <a name="" id="" class="btn btn-warning" href="http://localhost:8080/pruebaTecnica/index.php" role="button">Cancelar</a>
        <button type="submit" class="btn btn-success">Agregar</button>
    </div>
</div>

<?php
include("../public/footer.php")
?>