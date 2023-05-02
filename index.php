<?php

include("./src/view/layout/navbar.php");

$data = json_decode(file_get_contents("http://localhost:8080/pruebaTecnica/src/controller/controllerConsolas/consolasController.php"), true);

?>

<div class="table-responsive table-bordered">
    <h2 class="text-center">Consolas</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Consola</th>
                <th scope="col">Precio</th>
                <th scope="col">Opción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $consola) {
            ?>
                <tr class="">

                    <td><?php echo $consola["consola"] ?></td>
                    <td>$ <?php echo number_format($consola["precioMinimo"]) ?></td>
                    <td>
                        <form id="formulario" name="formulario" method="post" action="./src/view/carrito/carrito.php">
                            <input name="consola" type="hidden" id="consola" value="<?php echo $consola["consola"] ?>" />
                            <input name="precioMinimo" type="hidden" id="precioMinimo" value="<?php echo $consola["precioMinimo"] ?>" />
                            <input name="precioEstandar" type="hidden" id="precioEstandar" value="<?php echo $consola["precio"] ?>" />
                            <input name="precioMaximo" type="hidden" id="precioMaximo" value="<?php echo $consola["precioMaximo"] ?>" />
                            <input name="cantidad" type="hidden" id="cantidad" value="1" />
                            <input name="descuento" type="hidden" id="descuento" value="%<?php echo $consola["descuento"] ?>" />
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                        </form>
                    </td>

                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include("./src/view/layout/footer.php");
?>