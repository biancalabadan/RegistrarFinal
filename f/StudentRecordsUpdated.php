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
					<button class="subnavbtn"><a href="Admission.html">Admission <i class="fa fa-caret-down"></i></a></button>
					<div class="subnav-content">
						<a href="Enrollment.html">Enrollment</a>
						<a href="Transfer.html">Transfer</a>
						<a href="Dismissal.php">Dismissal</a>
					</div>
				</div>
				
				<div class="subnav">
					<button class="subnavbtn">Records <i class="fa fa-caret-down"></i></button>
					<div class="subnav-content">
						<a href="StudentRecordsUpdated.php">Students</a>
						<a href="Check.html">Check Project/Violation</a>
					</div>
				</div>
				
				<div class="subnav">
					<button class="subnavbtn">Request <i class="fa fa-caret-down"></i></button>
					<div class="subnav-content">
						<a href="transcript.htm">Transcript of Records</a>
						<a href="transfer.htm">Transfer Credentials</a>
						<a href="diploma.htm">Authenticated Copy of Diploma</a>
						<a href="course.htm">Course Description</a>
					</div>
				</div>
				
				<a href="#contact">Contact</a>
			</div>
		</nav>
		
		<article>
			<h1>Student Records</h1>
			<table class="table1" align="center" border="1" cellpadding="10">
				<tr>
					<th>Name</th>
					<th>Gender</th>
					<th>Year & Course</th>
					<th>Contact</th>
				</tr>
				
				<?php
				$con = mysqli_connect("localhost","root","","newdb");
				if($con-> connect_error)
				{
					die("Connection failed: ".$con->connect_error);
				}
				
				$sql = "select name,gender,year_course,contact from studentinfo";
				$result = $con->query($sql);
				
				if($result-> num_rows > 0) {
					while($row = $result-> fetch_assoc()) {
						echo "<tr>
					<td>".$row["name"]."</td>
					<td>".$row["gender"]."</td>
					<td>".$row["year_course"]."</td>
					<td>".$row["contact"]."</td>
				</tr>";
					}
					echo "</table>";
				}
				else {
					echo "0 result";
				}
				$con->close();
			?>
		</article>
		<footer>
			<small>
				School Registrar <br />
				@2020 All Rights Reserved.Registrar®
			</small>
		</footer>
	</body>
</html>
