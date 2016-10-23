<!DOCTYPE html>
<?php
mysql_connect("localhost","root","");
mysql_select_db("blog1");
session_start();
?>

<?php

if(isset($_SESSION['name'])){
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>admin</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<style>
	.well{
		margin-top: 41px;
	}
	.col-md-4{
		margin-top: 40px;
	}
	
</style>

</head>
<body>
<?php

if(isset($_POST['submit'])){
	
	$title =$_POST['title'];
	$category = $_POST['category'];
	$content = $_POST['content'];
	$posted = $_SESSION['name'];

	mysql_query("INSERT INTO blogdata(title,category,content,Postedby) VALUES ('$title','$category','$content','$posted')");
	header("Location:base.php");
}else{
?>
<div class="col-md-4 col-md-offset-8">
SIGNED IN AS <?php echo $_SESSION['name']; ?><br><a href="logout.php">logout</a>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
	<div class="well">
	<h1>Create New Post</h1>
	<hr>
	<form action='admin.php' method="post">
	<h4>Title:</h4><input class ="form-control" type="text" name="title" required><br>
	<h4>Category:</h4><input class ="form-control" type="text" name="category"><br>
	<h4>Content:</h4><textarea class="form-control" name="content" required></textarea><br>
	<input type="submit" name="submit" value="Post" class="btn btn-primary btn-block">

	</form>
	</div>
</div>
</div>
	
<?php
}
?>
</body>
</html>
<?php
}else echo"you must login first <a href='index.php'>login</a>";
<?php echo "hello"; ?>
?>

