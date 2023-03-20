<?php
include 'templates/header.php';
?>

<body>
    <?php
    include 'templates/main-header.php';
    ?>


    <h1>Ví dụ giỏ hàng</h1>
    <form method="post" action="cart.php">

        <table>



            <?php

            if (
                isset($_SESSION['cart']) && count($_SESSION['cart']) > 0
            ) {

                echo '<tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Items Price</th>
            </tr>';
                $sql = "SELECT * FROM products WHERE id IN (";
                foreach ($_SESSION['cart'] as $id => $value) {
                    $sql .= $id . ",";
                }
                $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
                $query = mysqli_query($conn, $sql);
                error_reporting();
                $totalprice = 0;
                while ($row = mysqli_fetch_array($query)) {
                    $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['price'];
                    $totalprice += $subtotal;
            ?>
                    <tr>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><input type="number" name="quantity[<?php echo $row['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" /></td>
                        <td><?php echo number_format($row['price']) ?>đ</td>
                        <td><?php echo number_format($_SESSION['cart'][$row['id']]['quantity'] * $row['price']) ?>đ</td>
                        <td><a href="cart.php?action=delete&id=<?php echo $row['id']; ?>">Remove</a></td>
                    </tr>
                <?php

                }
                ?>
                <tr>
                    <td colspan="4">Total Price: <?php echo number_format($totalprice) ?>đ</td>
                </tr>
                <br />
                <button type="submit" name="submit">Update Cart</button>
            <?php
            } else {
                echo "<tr><td colspan='4'>Giỏ hàng trống</td></tr>";
            }
            ?>

        </table>

    </form>

    <?php
    include 'templates/footer.php';
    ?>

    <?php
    include 'templates/Jquery.php';
    ?>

</body>

</html>