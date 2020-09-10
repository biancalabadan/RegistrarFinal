<?php

 //resource address
 $reponse = json_decode(file_get_contents('http://localhost/ITCC14_FinalProject-master/api.php'));

 

?>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Check Student</title>
		
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
			
			article {
				padding:10px;
			}
			
			article h1 {
				font-size:30px;
				font-family:Arial;
			}
			
			article p {
				font-family:Arial;
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
						<a href="Transfer.html">Transfer Credentials</a>
						<a href="diploma.htm">Authenticated Copy of Diploma</a>
					</div>
				</div>
				
			</div>
		</nav>
<table>
        <thead>
            <tr>
                <td>Student ID</td><br>
                <td>Name</td><br>
                <td>Year</td><br>
                <td>Course</td><br>
                <td>Contact no.</td><br>
            </tr>
        </thead>
        <tbody>
			<?php foreach ($reponse as $students): ?>
            <tr>
                <td><?=$students->student_id?></td><br>
                <td><?=$students->name?></td><br>
                <td><?=$students->year?></td><br>
                <td><?=$students->course?></td><br>
                <td><?=$students->email?></td><br>
            </tr>
            <?php endforeach ?>
          <tbody>
        </table>


</body>
</html>
