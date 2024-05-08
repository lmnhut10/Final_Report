
    <!-- Hero Section Begin -->
    <section class="hero" style="color:black">
        <div class="container" >
            <div class="row">
                <div class="col-lg-3" >
                    <div class="hero__categories" >
                        <div class="hero__categories__all" >
                            <i class="fa fa-bars" style="color:black"></i>
                            <span style="color:black">All departments</span>
                        </div>
                        <ul>
                        <?php Department($conn); ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9" >
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#" method="POST">
                                
                                <input type="text" name="txtSearch" placeholder="Search" >
                                <button type="submit" id="btnSearch" name ="btnSearch" class="site-btn" style="color:black">SEARCH</button>
                            </form>
                        </div>
                        <!-- <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 90 785 3006</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div> -->
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/1.jpg">
                        <!-- <div class="hero__text">
                            <span>NEW ON</span>
                            <h2>Paimon Shop</h2> 
                            
                            <a href="?page=shop-grid" class="primary-btn">SHOP NOW</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/sofa.jpeg">
                            <h5><a href="#">SOFA</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/Bed.jpg">
                            <h5><a href="#">Bed</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/Lamp.jpg">
                            <h5><a href="#">Lamp</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/Chandeliers.jpg">
                            <h5><a href="#">Chandeliers</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/electriccooker.jpeg">
                            <h5><a href="#">Electric Cooker</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/electrickettle.jpg">
                            <h5><a href="#">Electric Eettle</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/Knife.jpg">
                            <h5><a href="#">Knife and Scissors</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
    <?php 
                if(isset( $_POST['btnSearch']))
                {
                    $search = $_POST['txtSearch'];
                    $result = mysqli_query($conn,"SELECT product_id, product_name, price, pro_qty, pro_image, cat_name 
                    from product a, category b 
                    where a.cat_id = b.cat_id AND product_name like '%$search%' order by pro_image desc");
                    ?>
                    <section class="featured spad">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <h2>Search Results</h2>
                                    </div>
                                <div class="featured__controls">
                            </div>
                            <div class="row featured__filter">
                    <?php
                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) { 
                    ?>
                   
                                <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                                    <div class="featured__item">
                                        <div class="featured__item__pic set-bg" data-setbg="img/<?php echo $row['pro_image'] ?>">
                                            <ul class="featured__item__pic__hover">
                                            
                                                <li><a href="#"><span class="fa fa-heart"></span></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="?page=shop-details&&id=<?php echo  $row['product_id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="featured__item__text">
                                            <h6><a href="?page=shop-details&&id=<?php echo  $row['product_id'] ?>"><?php echo $row["product_name"] ?></a></h6>
                                            <h5>$<?php echo $row["price"] ?></h5>
                                        </div>
                                    </div>
                                </div>
                    <?php
                    }
                    ?>
                            </div>
                        </div>
                    </section>
                    <?php
                }else
                {
                    include_once('Featured.php');
                }
                ?>

    <!-- Featured Section Begin -->

    <!-- Featured Section End -->

    


    



