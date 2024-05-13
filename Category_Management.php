
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
                        <li ><a  href="?page=pm">All</a></li>

                            <?php Category_List($conn ); ?>
                            
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
                        <h2 style="color:black">Category Management</h2>
                        <!-- <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Category Management</span>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
<!-- Bootstrap --> 

    
<script language="javascript">
            function deleteConfirm() {
                if(confirm("Are you sure to delete?")) {
                    return true;
                }
                else {
                    return false;
                }
            }
        </script>
        <form name="frm" method="post" action="">
        <!-- <h1>Category Management</h1> -->
        <p>
        <i class="fa fa-plus"></i> <a href="?page=addc"> Add</a>
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Category Name</strong></th>
                     <th><strong>Description</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
                include_once("connection.php");
                if(isset($_GET["function"])=="del")
                {
                    if(isset($_GET["id"]))
                    {
                       $id = $_GET["id"];
                        mysqli_query($conn, "delete from category where cat_id='$id'");
                    }
                         
                }

                $No = 1;
                $result = mysqli_query($conn, "select * from category");
                while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                ?>
			<tr>
                <td class="cotCheckBox"><?php echo $No; ?></td>
                <td><?php echo $row['Cat_Name']?></td>
                <td><?php echo $row['Cat_Des']?></td>
                <td style='text-align:center'>
           
                <a href="?page=upc&&id=<?php echo $row["Cat_ID"];?>">
                <img src='img/edit.png' border = '0'/></a></td>
                <td style='text-align:center'>
              <a href="?page=cat&&function=del&&id=<?php echo $row["Cat_ID"];?>"onclick="return deleteConfirm()">
              <img src='img/delete.png' border='0' /></a></td>
            </tr>
            <?php
                $No++;
                }
                
                ?>
			</tbody>
        </table>  
        
        
        
 </form>