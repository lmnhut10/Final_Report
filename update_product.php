<!-- Hero Section Begin -->
<section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Department</span>
                        </div>
                        <ul>
						    <?php Department($conn); ?>
                        </ul>
                        <ul>
                        <li ><a  href="?page=pm">All</a></li>

                        <?php Category_List($conn,$sql ); ?>
                            
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
                                <h5>+84 77 444 6678</h5>
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
                        <div class="breadcrumb__option">
                            <!-- <a href="./index.html">Home</a>
                            <span>Products Management</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

<?php
	include_once("connection.php");
	function bind_Category_List($conn, $selectedValue)
	{
		$sqlString = "SELECT cat_id, cat_name from category";
		$result = mysqli_query($conn, $sqlString);
echo "<SELECT name ='CategoryList' class='form-control'>
			<option value='0'>Choose Category</option>";
			while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				if($row['cat_id']==$selectedValue)
				{
					echo "<option value ='".$row['cat_id']."' selected>".$row['cat_name']."</option>";
				}
				else
				{
					echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
				}
			}
		echo "</select>";
	}
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sqlString = "SELECT product_name, price, smalldesc, detaildesc, prodate, pro_qty, pro_image, cat_id from product where product_id='$id'";

		$result = mysqli_query($conn, $sqlString);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$proname = $row['product_name'];
		$short = $row['smalldesc'];
		$detail = $row['detaildesc'];
		$price = $row['price'];
		$qty = $row['pro_qty'];
		$pic = $row['pro_image'];
		$category = $row['cat_id'];
?>
<div class="container">
	<h2>Updating Product</h2>

	 	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="txtTen" class="col-sm-2 control-label">Product ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" 
								  placeholder="Product ID" readonly value='<?php echo $id?>'/>
							</div>
				</div> 
				<div class="form-group"> 
					<label for="txtTen" class="col-sm-2 control-label">Product Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" 
								  placeholder="Product Name" value='<?php echo $row["product_name"]?>'/>
							</div>
                </div>   
                <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product category(*):  </label>
							<div class="col-sm-10">
								<?php bind_Category_List($conn, $category); ?>
							</div>
                </div>  
                          
                <div class="form-group">  
                    <label for="lblPrice" class="col-sm-12 control-label">Price(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value="<?php echo $price?>"/>
							</div>
                 </div>   
                            
                <div class="form-group">   
                    <label for="lblShort" class="col-sm-5 control-label">Short description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Short description" value="<?php echo $short?>"/>
							</div>
                </div>
                            
                <div class="form-group">   
                    <label for="lblDetail" class="col-sm-5 control-label">Detail Description(*):  </label>
<div class="col-sm-10">
							      <textarea type="text" name="txtDetail" id="txtDetail" class="form-control" style="height: 150px" row="4" value="<?php echo $detail?>"></textarea>
							</div>
                </div>
                            
            	<div class="form-group">  
                    <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*):  </label>
							<div class="col-sm-10">
							      <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="<?php echo $qty ?>"/>
							</div>
                </div>
 
				<div class="form-group">  
	                <label for="sphinhanh" class="col-sm-2 control-label">Image(*):  </label>
							<div class="col-sm-10">
							<img src='img/<?php echo $pic; ?>' border='0' width="50" height="50"  />
							      <input type="file" name="txtImage" id="txtImage" class="form-control" value=""/>
							</div>
                </div>
                        
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="site-btn" name="btnUpdate" id="btnUpdate" value="Update" />
                              <input type="button" class="site-btn" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=pm'" />
                              	
						</div>
				</div>
			</form>
</div>
<?php
	if(isset($_POST['btnUpdate']))
	{
		$id = $_POST['txtID'];
		$proname = $_POST['txtName'];
		$short = $_POST['txtShort'];
		$detail = $_POST['txtDetail'];
		$price = $_POST['txtPrice'];
		$qty = $_POST['txtQty'];
		$pic = $_FILES['txtImage'];
		$cat = $_POST['CategoryList'];
		
		$err = "";

		
		if($err !="")
		{
			$err .= "Enter ID</br>";
		}
		else
		{
			if($pic['name'] != "")
			{
				if ($pic['type']=="image/jpg" || $pic['type']=="image/jpeg"|| 
					$pic['type']=="image/png" || $pic['type']=="image/gif")
				{
					if($pic['size']<=614400)
					{
						// $sql="select * from Product where Product_ID='$id' and Product_Name='$proname'";
						// $result = mysqli_query($conn, $sql);
						// if(mysqli_num_rows($result)=="0")
						// {
							copy($pic['tmp_name'], "img/".$pic['name']);
							$filepic = $pic['name'];
							
							$sqlString = "UPDATE product set product_name ='$proname', price = '$price', smalldesc ='$short', detaildesc ='$detail', pro_qty ='$qty', pro_image ='$filepic', cat_id ='$cat', 
							prodate ='".date('Y-m-d H:i:s')."' where product_id ='$id'";
							mysqli_query($conn,$sqlString);
							echo '<meta http-equiv="refresh" content="0;URL=?page=pm"';	
						// }
						// else
						// {
						// 	echo "Duplicate name</br>";
						// }
					}
					else
					{
						echo "Image too large</br>";
					}
				}
				else
				{
					echo "Incorrect format</br>";
				}
			}
			else
			{
				// $sql="SELECT * from Product where Product_ID='$id' and Product_Name='$proname'";
				// $result = mysqli_query($conn, $sql);
				// if(mysqli_num_rows($result)=="0")
// {
					$sqlString = "UPDATE product set product_name ='$proname', price = '$price', smalldesc ='$short',  detaildesc ='$detail', pro_qty='$qty', cat_id='$cat', 
					prodate='".date('Y-m-d H:i:s')."' where product_id ='$id'";
					mysqli_query($conn,$sqlString);
					echo '<meta http-equiv="refresh" content="0;URL =?page=pm"';	
					
				// }
				// else
				// {
				// 	echo "Duplicate name</br>";
				// }
			}
		}
	}
?>

<?php
	}
	else
	{
		echo "Duplicate name</br>";
		
	}
?>
