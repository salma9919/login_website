<script>
	function validation(){
		var email= document.forms["form"]['email'].value;
		var name= document.forms["form"]['name'].value;
		var pas= document.forms["form"]['password'].value;
		var conpas= document.forms["form"]['conpassword'].value;
		var flag = 0;
		//var re = /^[^\s@]+@[^\s@]+$/;
		if (email==""){alert("email field is empty");flag=1;}
		
	//	else if(!re.test(emaiil)) {alert("enter a valide email");flag=1;}

		if (name==""){alert("name field is empty");flag=1;}

		if ( pas==""){alert("password field is empty");flag=1;}

		if (conpas==""){alert("confirm password field is empty");flag=1;}

		if(conpas!=pas){alert("password and confirmation password are not the same");flag=1;}
		
		if(falg){return false}
	}
</script>
<?php

include 'config.php';
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$conpassword = md5($_POST['conpassword']);
	if(true){
	$query=mysqli_query( $conn,"select * from user_table where email='".$email."'") or die(mysqli_error( $conn));
	$res=mysqli_fetch_array($query);
	if(!$res){
		$sql = "INSERT INTO user_table (email, name , password)VALUES ('$email','$username','$password')";
		$Result = mysqli_query($conn,$sql);
		if(!$Result){
			echo "<script>alert('something went wrong')</script>";
		}
	}
	else{
		echo "<script>alert('email already exists')</script>";
	}
}

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>register page</title>

	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

</head>
<body>
	<div class="container">
		<form action="" method="POST" onsubmit="return validation();" class="regestration-form" name="form">
			<p class="login-test" style="font-size: 2rem; font-weight: 800";>Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" >
			</div>
            <div class="input-group">
				<input type="text" placeholder="Email" name="email" >
			</div>
			<div class="input-group">
				<input type="text" placeholder="Password" name="password" >
			</div>
            <div class="input-group">
				<input type="text" placeholder="Confirm Password" name="conpassword" >
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p calss="login-text">already have an account?<a href="index.php">log in</p>
		</form>
	</div>
</body>
</html>