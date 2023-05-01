<div class="table-responsive table-bordered m-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Productos</th>
                <th scope="col">Precios</th>
                <th scope="col">Descuento</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['carrito'])) {
                $total = 0;
                for ($i = 0; $i <= count($carritoTotal) - 1; $i++) {
                    if (isset($carritoTotal[$i])) {
                        if ($carritoTotal[$i] != NULL) {
            ?>
                            <tr class="">
                                <td scope="row"><?php echo $carritoTotal[$i]['cantidad'] ?> : <?php echo $carritoTotal[$i]['consola'];  ?></td>
                                <td><?php echo $carritoTotal[$i]['precioMinimo'] * $carritoTotal[$i]['cantidad'] ?></td>
                                <td>5</td>
                                <td>95000
                                    $ <?php echo $carritoTotal[$i]['precioMinimo'] - $carritoTotal[$i]['descuento'] ?>
                                </td>
                            </tr>
            <?php
                            $total = $total + ($carritoTotal[$i]['precioMinimo'] * $carritoTotal[$i]['cantidad']);
                        }
                    }
                }
            }
            ?>
            <tr class="">
                <td colspan="3" scope="row">Sub Total</td>
                <td>$ <?php if (isset($_SESSION['carrito'])) {
                            $total = 0;
                            for ($i = 0; $i <= count($carritoTotal) - 1; $i++) {
                                if (isset($carritoTotal[$i])) {
                                    if ($carritoTotal[$i] != NULL) {
                                        $total = $total + ($carritoTotal[$i]['precio'] * $carritoTotal[$i]['cantidad']);
                                    }
                                }
                            }
                        }
                        if (!isset($total)) {
                            $total = '0';
                        } else {
                            $total = $total;
                        }
                        echo $total;
                        ?></td>
            </tr>
        </tbody>
    </table>
</div>