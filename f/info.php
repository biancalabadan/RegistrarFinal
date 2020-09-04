<html>
<body>
<?php
$database    = 'registrar_info';
$username    = 'root';
$host        = 'localhost';
$password    = '';


            $con = mysqli_connect($host,$username,$password,$database);

        if (!$con)
        {
            die('Could not connect: '.mysql_error());
        }

        mysql_select_db("registrar_info", $con);

        $sql="INSERT INTO student_info (name, gender, yc, contact)
        VALUES ('$_POST[name]','$_POST[gender]','$_POST[yc]','$_POST[contact]')";

        if (!mysql_query($sql,$con))
        {
            die('Error: '.mysql_error());
        }

        echo "Record added.";

        mysql_close($con);
?>
</body>
</html>