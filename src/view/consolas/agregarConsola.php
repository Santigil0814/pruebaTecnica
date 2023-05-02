<?php
include("../layout/navbar.php");
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
                <label for="" class="form-label">Nombre equipo</label>
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio mínimo</label>
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio máximo</label>
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descuento</label>
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
            </div>

        </form>
    </div>
    <div class="card-footer text-end">
        <button type="submit postion" class="btn btn-primary">Agregar</button>
    </div>
</div>

<?php
include("../layout/footer.php")
?>