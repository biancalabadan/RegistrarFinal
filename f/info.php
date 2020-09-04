<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Enrollment</title>
		<link rel="stylesheet" type="text/css" href="style2.css">
	</head>

	<body>
	<?php
		$nm=$_GET["nm"];
		$gender=$_GET["gd"];
		$yc=$_GET["yc"];
		$contact=$_GET["ct"];
		
		mysql_connect("localhost","root","");
		mysql_select_db("registrar_info");
		mysql_query("insert into student_info values"('$nm','$gender','$yc','$contact'));
		
	?>
	</body>
</html>