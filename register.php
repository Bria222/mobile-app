<?php




if(isset($_POST["register"]))
{
	$name = $_POST["name"];
	
	$email = $_POST["email"];
	
	$user = $_POST["user"];
	$pass = md5($_POST["pass"]);
	$conpass = md5($_POST["conpass"]);
	
	$result = mysql_query("SELECT * FROM members WHERE email='$email'") or mysql_error("Error in query");
	$email_check = mysql_num_rows($result);
	if($email_check==0)
	{
		if($pass==$conpass)
		{
				
		$query= mysql_query("INSERT INTO members VALUES(0,'$name','$email','$user','$pass','$conpass')") or die("Error in query!!");

		echo "<script>alert('You have successfully send your details');</script>";
			
		}
		else{
			echo "<script>alert('Password and Confirm Password are not matching!');</script>";
		}
	}
	else{
		echo "<script>alert('You are already registered member!!');</script>";
	}
		
	
}

?>


<!DOCTYPE html>

<html>
<head>
	<title></title>

</head>
<body>

	<style >
	{
		margin: 0px;
		padding: 0px;

	}
	body{
		font-size: 120%;
		background: #F8F8FF;
	}
	.header{
		width: 30%;
		margin: 50px auto 0px;
		color: white;
		background: #5F9EA0;
		text-align: center;
		border: 1px solid #B0C4DE;
		border-radius: none;
		border-radius: 10px 10px 0px 0px;
		padding: 20px;

	}
	form{
		width: 350px;
		margin: 0px auto;
		padding: 20px;
		border: 1px solid #B0C4DE;
		background: white;
		border-radius: 0px 0px 10px 10px;

	}
	.input-group{
		margin: 10px 0px 10px 0px;
	}
	.input-group label {
		display: block;
		text-align: left;
		margin: 3px;
	}
	.input-group input{
		height: 30px;
		width: 93%;
		padding: 5px 10px;
		font-size: 16px;
		border-radius: 5px;
		border:1px solid gray;
	}
	.btn{
		padding: 10px;
		font-size: 15px;
		color: white;
		background: #5F9EA0;
		border: none;
		border-radius: 5px;
	}


		
	</style>



<h2>Register with us:</h2>
<form name="reg" method="post" action="register.php" enctype="multipart/form-data">


<?php include('error.php');?>
	<div class="input-group">
		<label>Name</label>
		<input type="text" name="name">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="text" name="email">
	</div>
	<div class="input-group">
		<label>UserName</label>
		<input type="text" name="user">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="pass">
	</div>

	<div class="input-group">
		<label>Confirm Password</label>
		<input type="password" name="conpass">
	</div>
		<div class="input-group">
		
		<button type="submit" name="register" class="btn">Register</button>
	</div>
		<p>
	     Aready a member? <a href="login.php">Sign in</a>
       </p>

</form>


<?php
