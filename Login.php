<section class="breadcrumb-section set-bg" data-setbg="img/Background.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color:black">Login</h2>
                        <div class="breadcrumb__option" >
                            <a href="?page=content"style="color:black" >Home</a>
                            <span style="color:black">Login</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
<?php 
	if(isset( $_POST['btnLogin']))
	{
		$us = $_POST['txtUsername'];
		$pa = $_POST['txtPass'];
		$_POST['name'] = 'asdasdsa';
		$err = "";
		if($us=="")
		{
			$err .= "Enter Username, please</br>";

		}
		if($pa=="")
		{
			$err.="Enter Password, please</br>";
		}
		if($err !="")
		{
			echo $err;
		}
		else{
			include_once("connection.php");
			$pass = md5($pa);
			$res = mysqli_query($conn, "SELECT username, password, state FROM customer WHERE username='$us' AND password='$pass'")
            or die(mysqli_error($conn));
            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
			if(mysqli_num_rows($res)==1)
			{
				$_SESSION["us"]=$us;
                 $_SESSION["admin"]= $row["state"];
                
				echo '<meta http-equiv="refresh" content="0;URL =?page=content"/>';
			}
			else{
			echo "You loged in fail";
			}
			
			
		}
	}
	?>
<script>
	
	function process()
	{
		n = document.getElementById("txtUsername");
		pass = document.getElementById("txtPass");
		if(us.value=="")
		{
			alert("Enter Username please");
			return false;
		}
		

	}
</script>
</script>

<form id="form1" name="form1" method="POST" action="" onsubmit="return process()">
<div class="row">
	<div class="container">
    <div class="humberger__menu__nav mobile-menu">

        <label for="txtUsername" class="col-sm-2 control-label">Username(*):  </label>
		<div class="col-sm-10">
		      <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value=""/>
		</div>
      </div>  
      
    <div class="form-group">
		<label for="txtPass" class="col-sm-2 control-label">Password(*):  </label>			
		<div class="col-sm-10">
		      	<input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" value=""/>
		</div>
	</div> 
	<div class="form-group">
		<div class="btn_login_cancel">	 
        	<div class="col-sm-2"></div>
        		<div class="col-sm-10">
        			<input type="submit" name="btnLogin"  class="site-btn" id="btnLogin" value="Login"/>
            		<input type="button" name="btnCancel"  class="site-btn" id="btnLogin" value="Cancel"onclick="window.location='?page=content'"/>
				</div>  
			</div>
			</div>
	</div>
 </div>
    
</form>

   