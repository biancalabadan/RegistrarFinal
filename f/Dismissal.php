<?php
	if(isset($_POST['delete'])) //If the users clicks the delete button, proceeds

	{
		//Assigns the mySQL server name, username, password, and database name to a variable
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "newdb";
		
		$name = $_POST['sname'];  //Assigns the input of the user to the variable $name
		
		$connect = mysqli_connect($hostname,$username,$password,$dbname); //To connect to the mySQL database server
		
		$query = "delete from studentinfo where name='$name'";  //Delete the data inside table studentinfo in the database
		
		$result = mysqli_query($connect,$query); //Perform a query, check for any errors
		
		if($result) //If $result runs, it will reply data deleted, otherwise no data deleted
		{
			echo "Data Deleted";
		}
		else{
			echo "No Data Deleted";
		}
		mysqli_close($connect); //close the mySQL
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
			<img class="logo" src="xu.png"> <!--displays image-->
		</div>
		
		<!--Creates navigation bar-->
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

		<div class="row">
  <div class="leftcolumn">
    <div class="card">
    
   <center><label for="name">Full Name</label>
        <input type="text" name="name" id="name"> <button class="button button1">Search</button><br>
        <br></center> <!--Search data in database-->
      <table class="table1" align="center" border="1" cellpadding="10"> <!--Creates a table-->
        <tr>
          <th>Name</th>
          <th>Gender</th>
          <th>Year & Course</th>
          <th>Contact</th>
         
        </tr>
        
        <?php
	      			//To connect to the mySQL database server
				$con = mysqli_connect("localhost","root","","newdb");
	      
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
    </div>
  </div>
  
	<form action="Dismissal.php" method="post"> <!--Creates a form and once submitted, will perform the action in Dismissal.php, post method requests web servers to accept data enclosed in body of request message for storing-->
	<br />
	<br />
	<font style="font-face:Arial;font-size:20px;"><strong>Remove Student</strong><br /></font> <br />
					Name:<br /><br /><input type="text" name="sname" required> <br /> <br /> <!--Creates an input for the user which is required-->
					<input type="submit" name="delete" value="Clear Data"> <!--Creates a submit button-->
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
