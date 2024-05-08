<!-- <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>                            
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
                                <input type="text" placeholder="What do yo u need?">
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
    </section> -->
    <!-- Hero Section End -->
<section class="breadcrumb-section set-bg" data-setbg="img/Background.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color:black">Profile</h2>
                        <div class="breadcrumb__option">
                            <!-- <a href="?page=content">Home</a>
                            <span>Profile</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
//Get custmer information
$query = "SELECT CustName, Address, email, telephone
		FROM customer
		WHERE Username='" .$_SESSION["us"]."'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$us  = $_SESSION["us"];
	$email = $row["email"];
	$fullname = $row["CustName"];
	$address = $row["Address"];
	$telephone = $row["telephone"];

//Update information when the user presses the "Update" button
if(isset($_POST['btnUpdate'])){
	$fullname = $_POST['txtFullname'];
	$address = $_POST['txtAddress'];
	$tel = $_POST['txtTel'];

	$test = check();
	if($test==""){
		//customer changes password
		if($_POST['txtPass1']!=""){
			$pass = md5($_POST['txtPass1']);

			$sq = "UPDATE customer
			SET CustName = '$fullname', Address = '$address',
			telephone = '$tel', Password = '$pass'
			WHERE Username = '" .$_SESSION['us'] ."'";

			mysqli_query($conn,$sq) or die(mysqli_error($conn));
		}
		else{
			$sq = "UPDATE customer
			SET CustName = '$fullname', Address = '$address',
			telephone = '$tel'
			WHERE Username = '" .$_SESSION['us'] ."'";

			mysqli_query($conn, $sq) or die(mysqli_error($conn));
		}
		echo'<meta http-equiv="refresh"  content="0;URL=index.php"/>';
	}else{
		echo $test;
	}
}

//Write check() function to check information
function check(){
	if($_POST['txtFullname']==""||$_POST['txtAddress']==""){
		return"<li> Enter Fullname or Address</li>";
	}
	elseif(strlen($_POST['txtPass1'])>0 && strlen($_POST['txtPass1'])<=5){
		return "<li> Password is greater than 5 characters</li>";
	}
	elseif($_POST['txtPass1'] != $_POST['txtPass2']){
		return"<li> Password and Confirm pass do not match</li>";
	}
	else{
		return"";
	}
}
?>
<div class="container">
	
<h2>Update Profile</h2>

			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    
                            <label for="lblTenDangNhap" class="col-sm-2 control-label">Username(*):  </label>
							<div class="col-sm-10">
							      <label class="form-control" style="font-weight:400"><?php echo $us; ?></label>
							</div>
                     </div>
                           
                         <div class="form-group">   
                            <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							       <label class="form-control" style="font-weight:400"><?php echo $email; ?></label>
							</div>
                          </div>  
                          
                           <div class="form-group"> 
                            <label for="lblMatKhau1" class="col-sm-2 control-label">Password(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass1" id="txtPass1" class="form-control"/>
							</div>
                            </div>
                            
                             <div class="form-group">
                                <label for="lblMatKhau2" class="col-sm-2 control-label">Confirm Password(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass2" id="txtPass2" class="form-control"/>
							</div>
                            </div>
                            
                            <div class="form-group">                         
                            	<label for="lblHoten" class="col-sm-2 control-label">Full name(*):  </label>
								<div class="col-sm-10">
							      <input type="text" name="txtFullname" id="txtFullname" value="<?php echo $fullname; ?>" 
								  class="form-control" placeholder="Enter Fullname, please"/>
								</div>
                            </div>
                           
                             <div class="form-group"> 
                             <label for="lblDiaChi" class="col-sm-2 control-label">Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtAddress" id="txtAddress" value="<?php echo $address; ?>" class="form-control" placeholder="Enter Address, please"/>
							</div>
                            </div>
                            
                            <div class="form-group"> 
                            <label for="lblDienThoai" class="col-sm-2 control-label">Telephone(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTel" id="txtTel" value="<?php echo $telephone; ?>" class="form-control" placeholder="Enter Telephone, please" />
							</div>
                            </div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
                              	
						</div>
					</div>
				</form>
</div>
