<?php

$con = mysqli_connect("localhost","root","","newdb");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
}

header("Content-Type:application/json");
if (isset($_GET['id']) && $_GET['id']!="") {
 
 $id = $_GET['id'];
 $result = mysqli_query($con,"SELECT * FROM `studentinfo` WHERE id=$id");
 if(mysqli_num_rows($result)>0){
 $row = mysqli_fetch_array($result);
 
 $name = $row['name'];
 $yc = $row['year_course'];
 $contact = $row['contact'];
 response($id, $name, $yc,$contact);
 mysqli_close($con);
 }else{
 response(NULL, NULL, 200,"No Record Found");
 }
}else{
 response(NULL, NULL, 400,"Invalid Request");
 }
 
function response($id,$name,$yc,$contact){
 $response['id'] = $id;
 $response['name'] = $name;
 $response['year_course'] = $yc;
 $response['contact'] = $contact;
 
 $json_response = json_encode($response);
 echo $json_response;
}
?>