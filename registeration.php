<html>
<script>
function vald() {
var username = document.forms["myform"]["username"].value;

var username2=username.trim();
if(!username)
{
	alert("nulll");
}
var emaiil = document.forms["myform"]["email"].value;
var emaiil2=emaiil.trim();
var password = document.forms["myform"]["pwd"].value;
var password2=password.trim();
var confirm = document.forms["myform"]["repwd"].value;
var confirm2=confirm.trim();
var flag=0;
if (username2 == null || username2 == " ") {
alert("Please enter the username.");
flag=1;
}
if (emaiil2 == null || emaiil2 == " ") {
alert("Please enter the email.");
flag=1;
}
else {
	var re = /^[^\s@]+@[^\s@]+$/;
  
  // If email's pattern is found in variable re
  if (re.test(emaiil2)) {
  	
    // Display valid email message
  	console.log(emaiil2 + " is a valid email address");
  }
  else 
  {
	  alert("enter a valide email");
	  flag=1;
  }
}
if (password2 == null || password2 == " ") {
alert("Please enter the password.");
flag=1;
}
if (confirm2 == null || confirm2 == " ") {
alert("Please confirm the password.");
flag=1;
}
if (password2 != confirm2) {
alert("reenter the password.");
flag =1;
}
if(flag==1)
{
	return false;
}


}
//else return true;
</script>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }
</style>


</head>
<body>
<h1>registration<h1>
<form name="myform" action='#' onsubmit=" return vald()" method='post' >
<table cellspacing='5' align='center'>
<tr><td>username:</td><td><input type='text' name='username'/></td></tr>
<tr><td>Email:</td><td><input type='text' name='email'/></td></tr>
<tr><td>Password:</td><td><input type='password' name='pwd'/></td></tr>
<tr><td>confirm password:</td><td><input type='password' name='repwd'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit' /></td></tr>
</table>

</form>




<?php
session_start();
if(isset($_POST['submit']))
{
 $link=mysqli_connect('localhost','root','',"registrations") or die(mysql_error());
 //mysql_select_db('new') or die(mysql_error());
 $username=$_POST['username'];
 $email=$_POST['email'];
 $password=$_POST['pwd'];
 //if($email!=''&&$username!='')
 //{
   $user_check_query = "SELECT * FROM users WHERE name='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($link, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
  $usernamegot=$user['name'];
    if ($user['name'] === $username) {
     echo"
    <script>
alert('user already exists');
</script>";
    }

}
else{
	$query = "INSERT INTO users (name, email, password) 
  			  VALUES('$username', '$email', '$password')";
			   header('location:index.php');
			  mysqli_query($link, $query);
}
 }
//}
?>
</body>

</html>