
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
                            <li><a href="#">Figure</a></li>
                            <li><a href="#">Pillow</a></li>
                            <li><a href="#">Image</a></li>
                            
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
                                <h5> +84 22 111 644</h5>
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
                        <h2 style="color:black">Add new Product</h2>
                        <div class="breadcrumb__option">
                            <!-- <a href="?page=content">Home</a>
                            <a href="?page=content">Recorded</a>
                            <span>Add New</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <?php
	include_once("connection.php");
	
	function bind_Category_List($conn){
		$sqlstring ="SELECT cat_id, cat_name from category";
		$result= mysqli_query($conn, $sqlstring);
		echo"<SELECT name ='CategoryList'class='form-control '
			<option value='0'>Choose category</option>";
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				echo"<OPTION value='".$row['cat_id']."'>".$row['cat_name']. "</option>";
			}
			echo"</select>";

	}

	if(isset($_POST["btnAdd"]))
	{  
		$id = $_POST["txtID"];
		$proname=$_POST["txtName"];
		$short=$_POST['txtShort'];
		$detail=$_POST['txtDetail'];
		$price=$_POST['txtPrice'];
		$qty=$_POST['txtQty'];
        $pic=$_FILES['txtImage'];
        $category=$_POST['CategoryList'];
		
		$err="";
		
		if(trim($proname)==""){
			$err.="<li>Enter product name, please</li>";
		}
		if(!is_numeric($price)){
			$err.="<li>Product price must be number</li>";
		}
		if(!is_numeric($qty)){
			$err.="<li>Product quantity must be number</li>";
		}
		if($err !=""){
			echo"<ul>$err</ul>";
		}
		else{
			if($pic['type']=="image/jpg"||$pic['type']=="image/jpeg"||$pic['type']=="image/png" ||$pic['type']=="image/gif"){
				if($pic['size']<=614400){
					$sq="SELECT * from product where product_id='$id'or product_name='$proname'";
                    $result= mysqli_query($conn,$sq);
                    
					if(mysqli_num_rows($result)==0)
					{
						copy($pic['tmp_name'],"img/".$pic['name']);
						$filePic =$pic['name'];
						$sqlstring="INSERT INTO product(
							product_id, product_name, price, smalldesc, detaildesc, prodate, pro_qty, pro_image, cat_id)
							VALUES('$id','$proname', $price,'$short','$detail','".date('Y-m-d H:i:s')."',$qty,'$filePic','$category')";
							
						mysqli_query($conn, $sqlstring);
						echo'<li>You have add successfully</li>';

					}	
					else {
						echo"<li>Duplicate product ID or Name</li>";
					}
				}
            }
            else
            {
                echo "Image fail";
            }
		}
	}
?>
   
<div class="container">
	<h2>Adding Product</h2>

	 	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
         
         <form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="txtTen" class="col-sm-2 control-label">Product ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" value="<?php if(isset($id)) echo $id?>"/>
							</div>
                
				<div class="form-group"> 
					<label for="txtTen" class="col-sm-2 control-label">Product Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" 
								  placeholder="Product Name" value=''/>
							</div>
                </div>   
                
                          
                <div class="form-group">  
                    <label for="lblGia" class="col-sm-2 control-label">Price(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value="<?php if(isset($price)) echo $price?>"/>
							</div>
                 </div>   

                 <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product category(*):  </label>
							<div class="col-sm-10">
                            
							      <?php bind_Category_List($conn); ?>
							</div>
                </div>  
                            
                <div class="form-group">   
                    <label for="lblShort" class="col-sm-12 control-label">Short description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Short description" value="<?php if(isset($short)) echo $short?>"/>
							</div>
                </div>
                            
                <div class="form-group">   
                    <label for="lblDetail" class="col-sm-2 control-label">Detail Description(*):  </label>
							<div class="col-sm-10">
							      <textarea type="text" name="txtDetail" id="txtDetail" class="form-control" style="height: 150px" row="4" value=""></textarea>
							</div>
                </div>
                            
            	<div class="form-group">  
                    <label for="lblQty" class="col-sm-2 control-label">Quantity(*):  </label>
							<div class="col-sm-10">
							      <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="<?php if(isset($qty)) echo $qty?>"/>
							</div>
                </div>
 
				<div class="form-group">  
	                <label for="lblImage" class="col-sm-2 control-label">Image(*):  </label>
							<div class="col-sm-10">
							
							      <input type="file" name="txtImage" id="txtImage" class="form-control" value=""/>
							</div>
                </div>
                        
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="site-btn" name="btnAdd" id="btnAdd" value="Add"/>
                              <input type="button" class="site-btn" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=pm'" />
                              	
						</div>
				</div>
			</form>
			</div>
</div>



