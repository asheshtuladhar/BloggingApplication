<?php
	mysql_connect("localhost","root","");
	mysql_select_db("blog1");
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<style>
	.col-md-4{
		margin-top: 50px;
	}
</style>
</head>
<body>
<?php
	if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$pass = $_POST['password'];
	
	$result= mysql_query("SELECT * FROM users WHERE name = '$name'");
	$count = mysql_num_rows($result);
	if($count == 0){
	$query = "INSERT INTO users(id,name,password) VALUES(null,'$name','$pass')";
	mysql_query($query);
	header("Location:index.php");
}else{
	echo " That user already exists. go <a href='register.php'>back</a>";
}
}else{
?>
	<div class="col-md-4 col-md-offset-4">
	<div class="well">	
	<form action="register.php" method="post">
		Username<input class="form-control" type="text" name="name"><br>
		Password<input class="form-control" type="text" name="password"><br>
		<input type="submit" name="submit" class="btn btn-warning btn-block" value="Register"><br>
		<a href="index.php">cancel</a>
	</form>
	</div>
</div>
<?php } ?>
</body>
</html>