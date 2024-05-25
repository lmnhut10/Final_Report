<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>LISH OF PRODUCT</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*"><a href="?page=content">All</a></li>
                            <?php Featured($conn); ?>


                        </ul>
                    </div>
                </div>
            </div>

            <div class="row featured__filter">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $result = mysqli_query($conn, "SELECT product.product_id, product.product_name, product.price, product.pro_qty, product.pro_image, category.cat_name 
                        from product, category where product.cat_id = category.cat_id and '$id'=category.cat_id ");
                } else {

                    $result = mysqli_query($conn, "SELECT product_id, product_name, price, pro_qty, pro_image, cat_name 
                    from product a, category b 
                    where a.cat_id = b.cat_id order by pro_image desc");
                }
                $No = 1;
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    if ($No < 9) {
                        ?>




                        <div class="col-lg-3 col-md-4 col-sm-6 mix ">

                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="img/<?php echo $row['pro_image'] ?>">
                                    <ul class="featured__item__pic__hover">

                                        <li><a href="#"><span class="fa fa-heart"></span></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="?page=shop-details&&id=<?php echo $row['product_id'] ?>"><i
                                                    class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a
                                            href="?page=shop-details&&id=<?php echo $row['product_id'] ?>"><?php echo $row["product_name"] ?></a>
                                    </h6>
                                    <h5>$<?php echo $row["price"] ?></h5>
                                </div>
                            </div>

                        </div>
                    <?php
                    }
                    $No++;
                }
                ?>



            </div>
        </div>
    </section>
</body>

</html>