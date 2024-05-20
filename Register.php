<section class="breadcrumb-section set-bg" data-setbg="img/Background.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color:black">Register</h2>
                        <div class="breadcrumb__option">
                            <!-- <a href="?page=content" style="color:black">Home</a>
                            <span style="color:black">Register</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
if(isset($_POST['btnRegister']))
{	
	$us = $_POST['txtUsername'];
	$pass1 = $_POST['txtPass1'];
	$pass2 = $_POST['txtPass2'];
	$fullname = $_POST['txtFullname'];
	$email = $_POST['txtEmail'];
	$address = $_POST['txtAddress'];
	$tel = $_POST['txtTel'];
	
	if(isset($_POST['grpRender'])){
		$sex = $_POST['grpRender'];
	}
	$date = $_POST['slDate'];
	$month = $_POST['slMonth'];
	$year = $_POST['slYear'];
	
	$err = "";
	if($us==""||$pass1=="" ||$pass2==""||$fullname==""
	||$email==""||$address==""||!isset($sex)){
		$err .="<li>Enter fields with mark (*), please</li>";
	}
	
	if(strlen($pass1)<=5){
		$err .="<li>Password must be greater than 5 chars</li>";
	}
	
	if($pass1!=$pass2){
		$err .="<li>Password and confirm password are the same</li>";
	}
	
	if($_POST['slYear']=="0"){
		$err .="<li>Choose Year of Birth, please</li>";
	}

	if($err!= ""){
		echo $err;
	}
	else{
        include_once("connection.php");
        $pass = md5($pass1);
        $sq =  "SELECT * FROM customer WHERE Username='$us' OR email='$email'";
        $res = mysqli_query($conn,$sq);
        if(mysqli_num_rows($res)==0)
        {
            mysqli_query($conn, "INSERT INTO customer(Username, Password, CustName, gender, Address, telephone, 
            email, CusDate, CusMonth, CusYear, SSN, ActiveCode, state) 
            VALUES ('$us', '$pass', '$fullname', $sex, '$address', '$tel', '$email',
            $date, $month, $year,'', '',0)") or die(mysqli_error($conn));
            mysqli_query($conn, $sq) or die(mysqli_error($conn));

           
            echo "You have registered successfully";
        }
        else{
            echo "Username or email already exists! Please enter another name (email)!";
        }
    }
}
?>
<div class="container">
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">					    
                            <label for="txtTen" class="col-sm-2 control-label">Username(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value="<?php if(isset($us)) echo $us; ?>"/>
							</div>
                      </div>  
                      
                       <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Password(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass1" id="txtPass1" class="form-control" placeholder="Password"/>
							</div>
                       </div>     
                       
                       <div class="form-group"> 
                            <label for="" class="col-sm-2 control-label">Confirm Password(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass2" id="txtPass2" class="form-control" placeholder="Confirm your Password"/>
							</div>
                       </div>     
                       
                       <div class="form-group">                               
                            <label for="lblFullName" class="col-sm-2 control-label">Full name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtFullname" id="txtFullname" value="<?php if(isset($fullname)) echo $fullname; ?>" class="form-control" placeholder="Enter Fullname"/>
							</div>
                       </div> 
                       
                       <div class="form-group">      
                            <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtEmail" id="txtEmail" value="<?php if(isset($email)) echo $email; ?>" class="form-control" placeholder="Email"/>
							</div>
                       </div>  
                       
                        <div class="form-group">   
                             <label for="lbladdress" class="col-sm-2 control-label">Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtAddress" id="txtAddress" value="<?php if(isset($address)) echo $address; ?>" class="form-control" placeholder="Address"/>
							</div>
                        </div>  
                        
                         <div class="form-group">  
                            <label for="lbltelephone" class="col-sm-2 control-label">Telephone(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTel" id="txtTel" value="<?php if(isset($tel)) echo $tel; ?>" class="form-control" placeholder="Telephone" />
							</div>
                         </div> 
                         
                          <div class="form-group">  
                            <label for="lblsex" class="col-sm-2 control-label">Gender(*):  </label>
							<div class="col-sm-10">                              
                                      <label class="radio-inline"><input type="radio" name="grpRender" value="0" id="grpRender" 
                                        <?php if(isset($sex)&&$sex=="0"){ echo "checked";} ?> />
                                      Male</label>
                                    
                                      <label class="radio-inline"><input type="radio" name="grpRender" value="1" id="grpRender" 
                                      <?php if(isset($sex)&&$sex=="1"){ echo "checked";} ?> />
                                      Female</label>

							</div>
                          </div> 
                          
                          <div class="form-group"> 
                            <label for="lblRightBirth" class="col-sm-2 control-label">Date of Birth(*):  </label>
                            <div class="col-sm-10 input-group">
                                <span class="input-group-btn">
                                  <select name="slDate" id="slDate" class="form-control" >
                						<option value="0">Choose Date</option>
										<?php
                                            for($i=1;$i<=31;$i++)
                                             {
                                                 if($i==$date){
                                                     echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                                 }
                                                 else{
                                                 echo "<option value='".$i."'>".$i."</option>";
                                                 }
                                             }
                                        ?>
                				 </select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slMonth" id="slMonth" class="form-control">
                					<option value="0">Choose Month</option>
									<?php
                                        for($i=1;$i<=12;$i++)
                                         {
                                              if($i==$month){
                                                 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                             }
                                             else{
                                             echo "<option value='".$i."'>".$i."</option>";
                                             }
                                         }
                                    ?>
                				</select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slYear" id="slYear" class="form-control">
                                    <option value="0">Choose Year</option>
                                    <?php
                                        for($i=1990;$i<=2024;$i++)
                                         {
                                             if($i==$year){
                                                 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                             }
                                             else{
                                             echo "<option value='".$i."'>".$i."</option>";
                                             }
                                         }
                                    ?>
                                </select>
                                </span>
                           </div>
                      </div>	
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
                        <input type="submit"  class="site-btn" name="btnRegister" id="btnRegister" value="Register" />
                              	
						</div>
                     </div>
				</form>
</div>

    

