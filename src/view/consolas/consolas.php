<?php

include("../layout/navbar.php");

$data = json_decode(file_get_contents("http://localhost:8080/pruebaTecnica/src/controller/controllerConsolas/consolasController"), true);

?>

<div class="table-responsive table-bordered">
    <h2 class="text-center">Consolas</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Consola</th>
                <th scope="col">Precio</th>
                <!-- <th scope="col">Precio máximo</th> -->
                <th scope="col">Descuento</th>
                <th scope="col">Opción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $consola) {
            ?>

                <form id="formulario" name="formulario" method="post" action="../carrito/carrito.php">
                    <tr class="">
                        <!-- <td scope="row"><?php echo $consola["id_consola"] ?></td> -->
                        <td>
                            <input name="consola" type="hidden" id="consola" value="<?php echo $consola["consola"] ?>" />
                            <?php echo $consola["consola"] ?>
                        </td>
                        <td>
                            <input name="precioMinimo" type="hidden" id="precioMinimo" value="<?php echo $consola["precioMinimo"] ?>" />
                            <?php echo "$" . $consola["precioMinimo"] ?>
                        </td>
                        <!-- <td>
                            <input name="precioMaximo" type="hidden" id="precioMaximo" value="<?php echo $consola["precioMaximo"] ?>" />
                            <?php echo "$" . $consola["precioMaximo"] ?>
                        </td> -->
                        <input name="cantidad" type="hidden" id="cantidad" value="1" />
                        <td>
                            <input name="descuento" type="hidden" id="descuento" value="%<?php echo $consola["descuento"] ?>" />
                            <?php echo "%" . $consola["descuento"] ?>
                        </td>

                        <td>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                        </td>
                    </tr>
                </form>

            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include("../layout/footer.php");
?>