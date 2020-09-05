<?php

  $con = mysqli_connect('localhost', 'root', '') or die ("could not connect");
  mysqli_select_db($con,"studentdatabase") or die ('could not connect to database');

  //connect
  if(isset($_POST['search-btn'])) 
  {
    $searchq = $_POST['search-btn'];
    $seacrhq = preg_replace("#[^0-9a-z]#i", "",$searchq);
    $req = ("SELECT * FROM studentinfo WHERE name LIKE '%$searchq%' OR yc LIKE '%$searchq%' OR id LIKE '%$searchq%' OR contact LIKE '%$searchq%'") or die ("could not search");

    $query = mysqli_query($con,$req);
    $count = mysqli_num_rows($query);

    if($count == 0)
    {
      $Noutput = 'There was no search result!';
    }
    else
    {
        while($row = mysqli_fetch_array($query))
        {
          $fname = $row['name'];
          $ycn = $row['yc'];
          $idnum = $row['id'];
          $ctn = $row['contact'];

          $Foutput = '<div>' .$fname.'</div>';
          $Soutput = '<div>' .$ycn.'</div>';
          $Toutput = '<div>' .$idnum.'</div>';
          $Zoutput = '<div>' .$ctn.'</div>';
        }
    }
  }
 
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}
.header {
  padding: 30px;
  background-color: midnightblue;
}
img {
  max-width: 100%;
  height: auto;
}
.navbar {
  overflow: hidden;
  background-color: #996515; 
}
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.subnav {
  float: left;
  overflow: hidden;
}
.subnav .subnavbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: dimgray;
}
.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: brown;
  width: 100%;
  z-index: 1;
}
.subnav-content a {
  float: left;
  color: white;
  text-decoration: none;
}
.subnav-content a:hover {
  background-color: #eee;
  color: black;
}
.subnav:hover .subnav-content {
  display: block;
}
.search-box
{
  position: absolute;
  top: 25%;
  left: 5%;
  trans
}
.footer {
  padding: 20px;
  position: fixed;
  text-align: center;
  left: 0;
  bottom: 0;
  width: 100%;
  background: #A4945C;
}
</style>
</head>
<body>
  <div class="header">
    <img src="xu.png" alt="Xavier University Logo">
  </div>
<div class="navbar">
  <a href="reg.htm">Home</a>
  <div class="subnav">
    <button class="subnavbtn">Admission<i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="#company">Company</a>
      <a href="#team">Team</a>
      <a href="#careers">Careers</a>
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Records <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="StudentRecordsUpdated.html">Students</a>
      <a href="#option2">Check Project/Violation</a>
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Request <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="transcript.htm">Transcript of Records</a>
      <a href="tranfer.htm">Transfer Credentials</a>
      <a href="diploma.htm">Authenticated Copy of Diploma/a>
      <a href="course.htm">Course Description</a>
    </div>
  </div>
  <a href="#contact">Contact</a>
</div>  

 

 <form action="course.php" method="post">
    <div class="search-box">
        <input type="text" name="search-btn" placeholder="Search Here">
        <input type="submit" name="" value=">>">

            <?php
                  if($Foutput && $Soutput && $Toutput && $Zoutput)
                  {
                    echo("$Foutput");
                    echo("$Soutput");
                    echo("$Toutput");
                    echo("$Zoutput");
                  }
                  else
                  {
                    echo("$Noutput");
                  }
            ?>
      </div>
  </form>
<div class="footer">
  <h2>School Registrar</h2>
  <br><br>
  <p> @2020 All Rights Reserved Registrar</p>
</div>
</body>
</html>
