<!DOCTYPE html>
<?php
mysql_connect("localhost","root","");
mysql_select_db("blog1");
session_start();
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<style>
	.well{
		margin-top: 50px;
	}
</style>

</head>
<body>

<?php
if(isset($_POST['submit'])){
	//check login
	$name = $_POST['name'];
	$pass = $_POST['password'];

	$result = mysql_query("SELECT * FROM users WHERE name='$name'");
	$num = mysql_num_rows($result);
	if($num != 0){
	while ($row = mysql_fetch_array($result)) {
		$dbname = $row['name'];
		$dbpass = $row['password'];
	}
	if($dbname == $name && $dbpass == $pass){
		header("Location:admin.php");
		$_SESSION['name']= $name;
	}else{
		echo "incorrect password";
	
	}
}else{
	echo "the user doesnt exist";
}
}else{
?>	
<div class="row"> 
    <div class="col-md-4 col-md-offset-4">
    <div class="well">
   	<form action = "index.php" method="post">
	Username<input class="form-control"type="text" name="name"></br>
	Password<input class="form-control"type="password" name="password"></br>
	<input type="submit" name="submit" value="login" class="btn btn-success btn-block"><br>
	<a href="register.php">register?</a>
	</form>
	</div>
	</div>
</div>
<?php
}
?>
</body>
</html>