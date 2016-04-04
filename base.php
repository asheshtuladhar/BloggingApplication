<?php
mysql_connect("localhost","root","");
mysql_select_db("blog1");
session_start();


if(isset($_SESSION['name'])){
?>
<html>
<head>
<title>Show Blog</title>

</head>
<body>
Here is my Blog</hr>
<table border="1">
<thead>
	<tr><th>Title</th><th>Category</th><th>Content</th></tr>
</thead>
<?php
$sql = mysql_query("SELECT * FROM blogdata ORDER BY id DESC");


while($row = mysql_fetch_array($sql)){

	$title = $row['title'];
	$content = $row['content'];
	$category = $row['category'];
?>

<tbody>
<tr><td><?php echo $title; ?></td><td><?php echo $category; ?></td>
<td><?php echo $content; ?></td></tr>
</tbody>


<?php
}
?>
<?php }else{echo "You must log in first <a href='index.php'>login</a>";} ?>
</table>

</body>
</html>