<?php
mysql_connect("localhost","root","");
mysql_select_db("blog1");
session_start();


if(isset($_SESSION['name'])){
?>
<html>
<head>
<title>Show Blog</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<h1>Here is my Blog</h1><hr>
<table class="table table-stripped">
<thead>
	<tr><th>Title</th><th>Category</th><th>Content</th><th>Posted By</th></tr>
</thead>
<?php
$sql = mysql_query("SELECT * FROM blogdata ORDER BY id DESC");


while($row = mysql_fetch_array($sql)){

	$title = $row['title'];
	$content = $row['content'];
	$category = $row['category'];
	$posted = $row['Postedby'];
?>

<tbody>
<tr><td><?php echo $title;?></td><td><?php echo $category; ?></td>
<td><?php echo substr($content, 0,20). "...";?></td><td><?php echo $posted; ?> <button class="btn btn-success">Read</button></tr>
</tbody>


<?php
}
?>
<?php }else{echo "You must log in first <a href='index.php'>login</a>";} ?>
</table>

</body>
</html>