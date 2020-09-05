<?php
	if(isset($_POST['delete']))
	{
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "newdb";
		
		$name = $_POST['sname'];
		
		$connect = mysqli_connect($hostname,$username,$password,$dbname);
		
		$query = "delete from studentinfo where name='$name'"; 
		
		$result = mysqli_query($connect,$query);
		
		if($result)
		{
			echo "Data Deleted";
		}
		else{
			echo "No Data Deleted";
		}
		mysqli_close($connect);
	}		
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dismissal</title>
		<link rel="stylesheet" type="text/css" href="style1.css">

	</head> 
	<body>
		<div class="logonav">
			<img class="logo" src="xu.png">
		</div>

		<div class="navbar">
			<a href="home.html">Home</a>
		
			<div class="subnav"> 
		  		<button class="subnavbtn">Admission <i class="fa fa-caret-down"></i></button>
		     		<div class="subnav-content">
		     			<a href="Enrollment.html">Enrollment</a>
		     			<a href="Transfer.html">Transfer</a>
		  			<a href="Dismissal.html">Dismissal</a>
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
				<button class="subnavtn">Request <i class="fa fa-caret-down"></i></button>
				<div class="subnav-content">
					<a href="transcript.htm">Transcript of Records</a>
					<a href="transfer.htm">Transfer Credentials</a>
					<a href="diploma.htm">Authenticated Copy of Diploma</a>
					<a href="course.htm">Course Description</a>
				</div>
			</div>
			
			<a href="#contact">Contact</a>
		</div>

		<div class="row">
  <div class="leftcolumn">
    <div class="card">
    
   <center><label for="name">Full Name</label>
        <input type="text" name="name" id="name"> <button class="button button1">Search</button><br>
        <br></center>
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
    </div>
  </div>
  
	<form action="Dismissal.php" method="post">
	<br />
	<br />
	<font style="font-face:Arial;font-size:20px;"><strong>Remove Student</strong><br /></font> <br />
					Name:<br /><br /><input type="text" name="sname" required> <br /> <br />
					<input type="submit" name="delete" value="Clear Data">
  </form>
			
		  	<div class="rightcolumn">
		    		<div class="card">
		      			<h3>Contact Us</h3>
		      			<p>Having trouble? Contact us at https://www.xu.edu.ph/</p>
		    		</div>
		  	</div>
		</div>

		<footer>
			<small>School Registrar<br />
			@2020 All Rights Reserved. Registrar®</small>
		</footer>
	</body>
</html>