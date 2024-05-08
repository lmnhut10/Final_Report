<head>
<body style="background-size: cover;" background="./img/b1.jpg"></body>
    <meta charset="UTF-8">
    <meta name="description" content="Vinyl Template">
    <meta name="keywords" content="Vinyl, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Online </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="shortcut icon" href="img/LogoIm.png">
</head>

<body>
<?php
session_start();
//phpinfo();
include_once("connection.php");
?>
    
    

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="?page=content"><img src="img/Logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>2</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <!-- <div class="header__cart__price">item: <span>$00.00</span></div> -->
        </div>
        <div class="humberger__menu__widget">
            <!-- <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Vietnamese</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> -->
            <div class="header__top__right__auth">
            <?php 
										if(isset($_SESSION['us']) && $_SESSION['us'] != ""){
									?>
									 <table>
                                        <tr>
                                            <td>
                                                <a href="?page=prof"><i class="fa fa-user"></i> Hi,<?php echo $_SESSION['us'] ?></a>
                                            </td>
                                            <td>
                                             <a href="?page=logout"><i class="fa fa-sign-out"></i>| Log Out</a>
                                            </td>
                                        
                                        </tr>
                                    </table>
									<?php 
										}
										else{
									?>
									 <table>
                                        <tr>
                                            <td>
                                                <a href="?page=login"><i class="fa fa-user"></i> Login |</a>
                                            </td>
                                            <td>
                                                <a href="?page=register"></i>| Register</a>
                                            </td>
                                        
                                        </tr>
                                    </table>
									<?php 
										}
									?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="?page=content">Home</a></li>
                <li><a href="?page=shop-grid">Shop</a></li>
                <li><a href="#">Pages</a>         
                    <ul class="header__menu__dropdown">
                        
                        <li><a href="?page=shopping-cart">Cart</a></li>
                        <!-- <li><a href="?page=checkout">Check Out</a></li> -->
                        
                    </ul>
                </li>
                
                <li><a href="?page=contact">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>GreenDay11@gmail.com</li>
                <li>Free Shipping for all Order of $100</li>
            </ul>
        </div>
        <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                        <?php Department($conn); ?>
                            
                        </ul>
                    </div>
                </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top" style="background-color:#6666">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>GreenDay11@gmail.com</li>
                                <li><i class="fa fa-phone"></i>Phone: 0396707375</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <!-- <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div> -->
                            <!-- <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Vietnamese</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> -->
                            <div class="header__top__right__auth">
                            <?php 
										if(isset($_SESSION['us']) && $_SESSION['us'] != ""){
									?>
									 <table>
                                        <tr>
                                            <td>
                                                <a href="?page=prof"><i class="fa fa-user"></i> Hi, <?php echo $_SESSION['us'] ?></a>
                                            </td>
                                            <td>
                                             <a href="?page=logout"><i class="fa fa-sign-out"></i>| Log Out</a>
                                            </td>
                                        
                                        </tr>
                                    </table>
									<?php 
										}
										else{
									?>
									 <table>
                                        <tr>
                                            <td>
                                                <a href="?page=login"><i class="fa fa-user"></i> Login |</a>
                                            </td>
                                            <td>
                                                <a href="?page=register"></i>| Register</a>
                                            </td>
                                        
                                        </tr>
                                    </table>
									<?php 
										}
									?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="?page=content"><img src="img/Logo.jpg" alt=""></a>
                        
                    </div>
                </div>
                
                
                <div class="col-lg-6">
                    <?php if(isset($_SESSION['us']) && $_SESSION['us'] != ""){
                        ?> 
                    <nav class="header__menu">
                    
                        <ul>
                            <li class="active"><a href="?page=content">Home</a></li>
                            <li><a href="?page=shop-grid">Shop</a></li>
                            
                            <?php  if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){ 

                            ?>   <li><a href="?page=content">Admin Management</a>
                                <ul class="header__menu__dropdown">
                                    
                                    <li><a href="?page=pm">Product Management</a></li>
                                    <li><a href="?page=cat">Category Management</a></li>
                                    
                                </ul>
                            </li>
                                    <li><a href="?page=content">Pages</a>
                                <ul class="header__menu__dropdown">
                                    
                                    <li><a href="?page=shopping-cart">Shoping Cart</a></li>
                                    <!-- <li><a href="?page=checkout">Check Out</a></li> -->
                                    
                                </ul>
                            </li>
                                
                            <?php } else { 
                            ?>
                              <li><a href="?page=content">Pages</a>
                                <ul class="header__menu__dropdown">
                                    
                                    <li><a href="?page=shopping-cart">Shoping Cart</a></li>
                                    <!-- <li><a href="?page=checkout">Check Out</a></li> -->
                                    
                                </ul>
                            </li>
                           
                            <li><a href="?page=contact">Contact</a></li>
                            <?php 
                                } 
                             ?>
                        </ul> 
                        
                    </nav>
                    <?php 
                        } else {
                             ?> 
                             <nav class="header__menu">
                    
                             <ul>
                                 <li class="active"><a href="?page=content">Home</a></li>
                                 <li><a href="?page=shop-grid">Shop</a></li>
                                 
                                
                                 <li><a href="?page=contact">Contact</a></li>
                                 <li><a href="?page=shopping-cart">Shoping Cart</a></li>
                                 
                             </ul> 
                             
                         </nav>
                        <?php } ?>
                             
                </div>
                    
                   
                <!-- <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$00.00</span></div>
                    </div>
                </div> -->
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <?php
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
        if($page=="register")
        {
            include_once('Register.php');
        }
        else if($page=="login")
        {
            include_once('Login.php');
        }
        else if($page=="content")
        {
            include_once('content.php');
        }else if($page=="logout")
        {
            include_once('logout.php');
        }
        else if($page=="shop-grid")
        {
            include_once('shop-grid.php');
        }
        else if($page=="shopping-cart")
        {
            include_once('shoping-cart.php');
        }
        else if($page=="shop-details")
        {
            include_once('shop-details.php');
        }
        else if($page=="checkout")
        {
            include_once('checkout.php');
        }
        else if($page=="contact")
        {
            include_once('contact.php');
        }
        else if($page=="pm")
        {
            include_once('Product_Management.php');
        }
        else if($page=="addp")
        {
            include_once('add_product.php');
        }
        else if($page=="edit")
        {
            include_once('update_product.php');
        }
        else if($page=="cat")
        {
            include_once('Category_Management.php');
        }
        else if($page=="addc")
        {
            include_once('Add_Category.php');
        }
        else if($page=="upc")
        {
            include_once('Update_Category.php');
        }
        else if($page=="upa")
        {
            include_once('update_account.php');
        } else if($page=="prof")
        {
            include_once('profile.php');
        }
        
        else if($page=="Fea")
    {
        include_once('Featured.php');
    }
        
       
    }else
    {
        include_once ("content.php");
    }

?>
   

    

    <!-- Footer Section Begin -->
    <footer class="footer spad" style="background-color:#6666">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/Logo.jpg" alt=""></a>
                        </div>
                        <ul >
                            <li>Address: Ninh Kieu, Can Tho</li>
                            <li>Phone:  +84 13 11 200 2222</li>
                            <li>Email: GreenDay11@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget" >
                        <h6>Linked Lists</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                       
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"></div>
                        <!-- <div class="footer__copyright__payment"><img src="img/sale.png" alt=""></div> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script >
        function ConfirmDelete()
        {
            if(confirm("Are you sure? "))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>
    <?php // list category vinyl audio cassette
    include_once("connection.php");
	function Category_List($conn )
	{
		$sqlString = "SELECT cat_id, cat_name from category";
		$result = mysqli_query($conn, $sqlString);
		
			while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				echo '<li ><a  href="?page=pm&&id='.$row['cat_id'].'">'.$row['cat_name'].'</a></li>';
			}
	}
    function Featured($conn){
        $sqlString = "SELECT cat_id, cat_name from category";
        $result = mysqli_query($conn, $sqlString);
        while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<li data-filter=".Cassette"><a href="?page=content&&id='.$row["cat_id"].'">'.$row["cat_name"].'</a></li>';
			}
    }
    function Department($conn )
	{
		$sqlString = "SELECT cat_id, cat_name from category";
		$result = mysqli_query($conn, $sqlString);
		
			while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<li ><a  href="?page=shop-grid&&id='.$row['cat_id'].'">'.$row['cat_name'].'</a></li>';
			}
    }
    
    
    ?>
    
    



