<?php
	//Assigns the mySQL server name, username, password, and database name to a variable 
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
		
		else { //If input is empty, states that all fields required
			echo "All fields Required!";
		}
	}
	
?>
