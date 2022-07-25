<!doctype>
<html>
<head>
<style>
/*h1{
	background-color:purple;
}
p {
	color:green;
	font-size:25px;
	font-family:helvetica;
}*/
.mycss{
	color: black;
	font-size:50px;
	text-align:center;
	position:relative;
	top:200px; 
	left:120px;
    padding: 10px;
}
body {
	background-image: url("2429.jpg");
 background-color: #cccccc;
}
</style>
</head>
<body>

<?php
session_start();
$email=$_SESSION['email'];

$name=$_SESSION['name'];
echo "<p class='mycss'>WELCOME </p>";
echo "<p class='mycss'>$name</p>";



?>
</body>
</html>

