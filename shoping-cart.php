<script>
        function deleteConfirm(){
            if(confirm("Are you sure?")){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
    <script>
        function checkoutConfirm(){
            if(confirm("Thanks for support")){
                return true;
            }
            else{
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
                            <span>All departments</span>
                        </div>
                        <ul>
                        
                        <?php Department($conn ); ?>
                            
                        
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                
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
    <section class="breadcrumb-section set-bg" data-setbg="img/100.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color:black">Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php" style="color:black">Home</a>
                            <span style="color:black">Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
   
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
    
    <?php
    
    
        if(isset($_GET["function"]) =="del"){
            if(isset($_GET["id"])){
                $id =$_GET["id"];
            if(isset($_SESSION['cart']))
            {
                unset($_SESSION['cart'][$id]);
            }
            
            echo '<meta http-equiv="refresh" content="0; URL=?page=shopping-cart"/>' ;
            

        }
        }

    
    ?>
    <?php  if(isset($_GET["function1"]) =="delc"){
            if(isset($_GET["id"])){
                $id =$_GET["id"];
            if(isset($_SESSION['cart']))
            {
                unset($_SESSION['cart']);
            }
            echo '<meta http-equiv="refresh" content="0; URL=?page=shopping-cart"/>' ;          
            echo "<script> alert('Checkout successful ');location.href='?page=content';</script>";
            
        }
        }?> 
                            <?php 
                                $total =0;
                                if(isset($_SESSION['cart']))
                                {
                                    foreach($_SESSION['cart'] as $key => $value):
                                        $item_price = $value['price'] * $value['qty'];
                                        $total = $item_price;
                                        
                                ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/<?php echo $value['img'] ?>" height="125px" width="125px" alt="">
                                        <h5><?php echo $value['name'] ?></h5>
                                    </td>
                                    <td class="shoping__cart_price">
                                        <?php echo $value['price'] ?>
                                    </td>
                                    <td class="shoping__cart__quantity">                                      
                                        <?php echo $value['qty'] ?>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php echo $item_price ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                    <a href="?page=shopping-cart&&function=del&&id=<?php echo $key;?>" onclick="return deleteConfirm()"><span class="icon_close"></span>
                                    
                                    </td>
                                </tr>
                              
                                <?php endforeach;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="?page=shop-grid" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <!-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> -->
                            
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <!-- <h5>Discount Codes</h5> -->
                            <form action="#">
                                <!-- <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button> -->
                                
                            </form>
                        </div>
                    </div>
                </div>


                
                
                <div class="col-lg-6">
                <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add">
                                
                            </div>
                            
                            
                           
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span><?php echo $total ?></li>
                            <li>Tax <span><?php echo $total*0.1 ?></span></li>
                            <li>Total <span><?php echo $total*1.1 ?></span></li>
                        </ul>
                        
                        <a href="?page=shopping-cart&&function1=delc&&id=<?php echo $key;
                        ?>" onclick="return checkoutConfirm() class="primary-btn> CHECKOUT </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Shoping Cart Section End -->

   
    