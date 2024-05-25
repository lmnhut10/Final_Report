<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
    ?>
    <script>
        function deleteConfirm() {
            if (confirm("Are you sure?")) {
                return true;
            }
            else {
                return false;
            }
        }
    </script>



    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Departments</span>
                            <ul>
                                <?php Department($conn); ?>
                            </ul>
                        </div>

                        <ul>
                            <li><a href="?page=pm">All</a></li>

                            <?php Category_List($conn); ?>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>

                                </div>
                                <input type="text" placeholder="What do you need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 13-11-2002</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/Background.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color:black">Products Management</h2>
                        <!-- <div class="breadcrumb__option">
                            <a href="?page=content">Home</a>
                            <span>Products Management</span>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Management Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th class="shoping__product">Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th><a href="?page=addp">Add</a></th>


                                </tr>
                            </thead>
                            <?php //del button on pm 
                                include_once ("connection.php");
                                if (isset($_GET["function"]) == "del") {
                                    if (isset($_GET["id"])) {
                                        $id = $_GET["id"];
                                        $sq = "SELECT pro_image from product WHERE product_id='$id'";
                                        $res = mysqli_query($conn, $sq);
                                        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
                                        $filePic = $row['pro_image'];
                                        mysqli_query($conn, "DELETE FROM product WHERE product_id='$id'");
                                        echo '<meta http-equiv="refresh" content="0;URL =?page=pm"/>'
                                            ?>
                                    <!-- <script> document.getElementById("CMM").click();</script>  -->

                                    <?php

                                    }
                                    ?>


                            <?php
                                }
                                ?>
                            <tbody>
                                <?php //
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                        $result = mysqli_query($conn, "SELECT product.product_id, product.product_name, product.price, product.pro_qty, product.pro_image, category.cat_name 
                                    from product, category where product.cat_id = category.cat_id and '$id'=category.cat_id ");

                                    } else {
                                        $result = mysqli_query($conn, "SELECT product.product_id, product.product_name, product.price, product.pro_qty, product.pro_image, category.cat_name 
                                    from product, category where product.cat_id = category.cat_id ");
                                    }
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        ?>



                                    <tr>
                                        <td class="shoping__cart__item" style="width: 1000px">
                                            <img src="img/<?php echo $row['pro_image'] ?>" alt="" height="200px" width="200px">
                                            <h5><?php echo $row["product_name"]; ?></h5>
                                        </td>
                                        <td class="shoping__cart__item">

                                            <h5><?php echo $row["cat_name"]; ?></h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            $<?php echo $row["price"]; ?>
                                        </td>
                                        <td class="shoping__cart__price">


                                            <?php echo $row["pro_qty"]; ?>


                                        </td>
                                        <td class="shoping__cart__total">
                                            <a href="?page=edit&&id=<?php echo $row['product_id'] ?>"> EDIT</a>
                                        </td>
                                        <td class="shoping__cart__item__close">

                                            <a href="?page=pm&&function=del&&id=<?php echo $row["product_id"]; ?>"
                                                onclick="return deleteConfirm()"><span class="icon_close"></span>

                                        </td>
                                    </tr>
                                    <?php

                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- Shopping Cart Section End -->
    <?php
} else {
    echo "<script>alert('You are not administrator')</script>";
    echo '<meta http-equiv="refresh" content="0; URL=index.php"/>';
}
?>