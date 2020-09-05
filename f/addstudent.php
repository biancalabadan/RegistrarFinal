<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="newdb";
	
	$con = mysqli_connect($servername,$username,$password,$dbname);
	
	if(isset($_POST['submit']))
	{
		if(!empty($_POST['sname']) && !empty($_POST['gender']) && !empty($_POST['year_course']) && !empty($_POST['contact'])) {
			$name = $_POST['sname'];
			$gender = $_POST['gender'];
			$year_course = $_POST['year_course'];
			$contact = $_POST['contact'];
			
			$query = "insert into studentinfo(name,gender,year_course,contact) values('$name','$gender','$year_course','$contact')";
			
			$run = mysqli_query($con, $query) or die(mysqli_error());
			
			if($run) {
				echo "Student added!";
			}
			else {
				echo "error";
			}
		}
		
		else {
			echo "All fields Required!";
		}
	}
	
?>