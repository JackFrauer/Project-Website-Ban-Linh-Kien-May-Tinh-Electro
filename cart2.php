<?php
include 'templates/header.php';
?>

<body>
    <?php
    include 'templates/main-header.php';
    ?>
    <!------ Include the above in your HEAD tag ---------->
    <br>
    <br>
    <br>
    <form method="post" action="cart.php">
        <?php
        if (
            isset($_SESSION['cart']) && count($_SESSION['cart']) > 0
        ) {
            echo '<div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>';
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

                <td class="col-sm-8 col-md-6">
                    <div class="media">
                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo $row['image']; ?>" style="width: 72px; height: 72px;"> </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#"><?php echo $row['product_name']; ?></a></h4>
                            <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                        </div>
                    </div>
                </td>
                <td class="col-sm-1 col-md-1" style="text-align: center">
                    <input type="number" onchange="this.form.submit()" name="quantity[<?php echo $row['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" />
                </td>
                <td class="col-sm-1 col-md-1 text-center"><strong><?php echo number_format($row['price']) ?>đ</strong></td>
                <td class="col-sm-1 col-md-1 text-center"><strong><?php echo number_format($_SESSION['cart'][$row['id']]['quantity'] * $row['price']); ?>đ</strong></td>
                <td class="col-sm-1 col-md-1">
                    <button type="button" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i><a href="cart.php?action=delete&id=<?php echo $row['id']; ?>">Remove</a>
                    </button>
                </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>
                    <h5>Subtotal</h5>
                </td>
                <td class="text-right">
                    <h5><strong><?php echo number_format($totalprice); ?>đ</strong></h5>
                </td>
            </tr>
            <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>
                    <h5>Estimated shipping</h5>
                </td>
                <td class="text-right">
                    <h5><?php echo number_format($totalprice * 0.02); ?>đ</strong></h5>
                </td>
            </tr>
            <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>
                    <h3>Total</h3>
                </td>
                <td class="text-right">
                    <h3><?php echo number_format($totalprice + ($totalprice * 0.02)); ?>đ</strong></h3>
                </td>
            </tr>
            <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>
                    <a href='index.php'>
                        <button type="button" class="btn btn-default">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Continue Shopping
                        </button>
                    </a>
                </td>
                <td>

                    <form method="post" action="thanhtoan.php">
                        <button type="submit" class="btn btn-success" name="checkout">
                            Checkout <i class="fa fa-play" aria-hidden="true"></i>
                        </button>
                    </form>

                </td>
            </tr>
            <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>

                </td>
            </tr>
            </tbody>
            </table>
            </div>
            </div>
            </div>
        <?php
        } else {
            echo '<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">Your cart is empty</a></h4>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><strong></strong></td>
                                <td class="col-sm-1 col-md-1 text-center"><strong></strong></td>
                                <td class="col-sm-1 col-md-1">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>';
        }
        ?>
    </form>
    <br><br><br>

    <?php
    include 'templates/footer.php';
    ?>

    <?php
    include 'templates/Jquery.php';
    ?>

</body>

</html>