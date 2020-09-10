<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Student Records</title>
		
		<style>
			/* design or style for the body */
			body {
				font-family: Arial, Helvetica, sans-serif;
  				margin: 0;
			}
			
			/* design or style for the header */
			header {
				padding:30px;
				background-color:midnightblue;
			}
			
			/* design or style for the image inside header */
			header img {
				max-width: 100%;
				height: auto;
			}
			
			/* design or style for the navigation bar */
			.navbar {
				overflow:hidden;
				background-color:#996515;
			}
			
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
			
			/* design or style for the article section in those with labeled h1 */ 
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
			
			/* design or style for the footer section */
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
			<img src="xu.png" alt="Xavier University Logo"> <!--displays image-->
		</header>
		
		<!--Creates navigation bar-->
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
		
		<article>
			<h1>Student Records</h1>
			<table class="table1" align="center" border="1" cellpadding="10"> <!--Creates a table-->
				<tr>
					<th>Name</th>
					<th>Gender</th>
					<th>Year & Course</th>
					<th>Contact</th>
				</tr>
				
				<?php
				$con = mysqli_connect("localhost","root","","newdb"); //To connect to the mySQL database server
				if($con-> connect_error) //check connection
				{
					die("Connection failed: ".$con->connect_error);
				}
				
				$sql = "select name,gender,year_course,contact from studentinfo"; //Select data from the table studentinfo in the database
				$result = $con->query($sql); //Perform query
				
				if($result-> num_rows > 0) { //Fetch a result row
					while($row = $result-> fetch_assoc()) {
						echo "<tr>
					<td>".$row["name"]."</td>
					<td>".$row["gender"]."</td>
					<td>".$row["year_course"]."</td>
					<td>".$row["contact"]."</td>
				</tr>"; //displays data in rows
					}
					echo "</table>";
				}
				else {
					echo "0 result";
				}
				$con->close(); //close the mySQL
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
