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
                        <div class="breadcrumb__option">
                            <!-- <a href="./index.html">Home</a>
                            <span>Update Catgory</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


   <!-- Bootstrap --> 
<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
   <?php
	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		$result = mysqli_query($conn, "SELECT * FROM category WHERE Cat_ID='$id'");
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$cat_id = $row['Cat_ID'];
		$cat_name = $row['Cat_Name'];
		$cat_des = $row['Cat_Des'];
	?>
<div class="container">
	<h2>Updating Product Category</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Catepgy ID" readonly 
								  value='<?php echo $cat_id ;?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" 
								  value='<?php echo $cat_name;?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" 
								  value='<?php echo $cat_des;?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=cat'" />
                              	
						</div>
					</div>
				</form>
	</div>
    <?php
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0;URL=index/php?page=cat"/>';
	}
	?>


	<?php
		if(isset($_POST["btnUpdate"]))
		{
			$id = $_POST["txtID"];
			$name = $_POST["txtName"];
			$des = $_POST["txtDes"];
			$err="";
			if($name=="")
			{
				$err.="<li>Enter Category Name, Please</li>";
			}
			if($err!="")
			{
				echo "<ul>$err</ul>";
			}
			else
			{
				$sq="Select * from category where Cat_ID != '$id' and Cat_Name='$name'";
				$result = mysqli_query($conn,$sq);
				if(mysqli_num_rows($result)==0)
				{
					mysqli_query($conn, "UPDATE category SET Cat_Name = '$name', Cat_Des='$des' WHERE Cat_ID='$id'");
					echo '<meta http-equiv="refresh" content="0;URL=index.php?page=cat"/>';
				}
				else
				{
					echo "<li>Duplicate category Name</li>";
				}
			}
		}
    ?>