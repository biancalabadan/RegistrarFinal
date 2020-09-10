<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="newdb";
	
	$con = mysqli_connect($servername,$username,$password,$dbname); //To connect to the mySQL database server
	
	if(isset($_POST['submit'])) //Performs this when the user clicks the submit button in Enrollment.html
	{
		 //If the input in the following input variables are not empty, then the input of the user is stored in the variables shown below correspondingly
		if(!empty($_POST['sname']) && !empty($_POST['gender']) && !empty($_POST['year_course']) && !empty($_POST['contact'])) {
			$name = $_POST['sname'];
			$gender = $_POST['gender'];
			$year_course = $_POST['year_course'];
			$contact = $_POST['contact'];
			
			//Insert the data inside the variables above to the table studentinfo in the database
			$query = "insert into studentinfo(name,gender,year_course,contact) values('$name','$gender','$year_course','$contact')";
			
			
			$run = mysqli_query($con, $query) or die(mysqli_error()); //Perform a query, check for any errors
			
			if($run) { //If $run runs, it will reply Student added, otherwise error
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

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Student Records</title>
		
		<style>
			body {
				font-family: Arial, Helvetica, sans-serif;
  				margin: 0;
			}
			
			/* Header or Blog Title */
			header {
				padding:30px;
				background-color:midnightblue;
			}
			
			header img {
				max-width: 100%;
				height: auto;
			}
			
			/* Style the top navigation bar */
			.navbar {
				overflow:hidden;
				background-color:#996515;
			}
			
			/* Style the topnav links */
			.navbar a {
			  float:left;
			  display:16px;
			  color:white;
			  text-align:center;
			  padding: 14px 16px;
			  text-decoration:none;
			}
			
			.subnav {
			  float:left;
			  overflow:hidden;
			}

			.subnav .subnavbtn {
			  font-size:16px;  
			  border:none;
			  outline:none;
			  color:white;
			  padding:14px 16px;
			  background-color:inherit;
			  font-family:inherit;
			  margin:0;
			}
			
			.navbar a:hover, .subnav:hover .subnavbtn {
			  background-color: dimgray;
			}
			
			.subnav-content {
			  display: none;
			  position: absolute;
			  left:0;
			  background-color:brown;
			  width:100%;
			  z-index: 1;
			}
			
			.subnav-content a {
			  float:left;
			  color:white;
			  text-decoration:none;
			}
			
			.subnav-content a:hover {
			  background-color:#eee;
			  color:black;
			}
			
			.subnav:hover .subnav-content {
			  display: block;
			}
			
			}
			
			/* Spaces on top of table */
			.table1 {
				margin-top:20px;
			}
			
			/* style for text in h1 in the article section */ 
			article h1 {
				font-family:Arial;
				font-color:#F2F1E7;
				text-align:center;
				font-size:45px;
			}
			
			/* style in table texts */
			.table1 th, td {
				font-family:Arial;
				font-size:20px;
			}
			
			/* Footer */
			footer {
				padding:20px;
				position:fixed;
				bottom:0;
				left:0;
				width:100%;
				background-color: #A4945C;
				text-align:center;
			}
			
		</style>
	</head>
	
	<body>
		<header>
			<img src="xu.png" alt="Xavier University Logo">
		</header>
		
		<nav>
			<div class="navbar">
				<a href="home.html">Home</a>
				
				<div class="subnav">
					<button class="subnavbtn">Admission <i class="fa fa-caret-down"></i></button>
					<div class="subnav-content">
						<a href="Enrollment.html">Enrollment</a>
						<a href="Dismissal.php">Dismissal</a>
					</div>
				</div>
				
				<div class="subnav">
					<button class="subnavbtn">Records <i class="fa fa-caret-down"></i></button>
					<div class="subnav-content">
						<a href="StudentRecordsUpdated.php">Students</a>
						<a href="Check.php">Check Project/Violation</a>
					</div>
				</div>
				
				<div class="subnav">
					<button class="subnavbtn">Request <i class="fa fa-caret-down"></i></button>
					<div class="subnav-content">
						<a href="Transcript.htm">Transcript of Records</a>
						<a href="Transfer.html">Transfer</a>
						<a href="diploma.htm">Authenticated Copy of Diploma</a>
					</div>
				</div>
			</div>
		</nav>
		<button><a href="Enrollment.html">Back</button>

		<footer>
			<small>
				School Registrar <br />
				@2020 All Rights Reserved.Registrar®
			</small>
		</footer>
	</body>
	</html>
