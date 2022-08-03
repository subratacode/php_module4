<?php
include 'dbConnection.php';
$query="select * from student_details";
$result=mysqli_query($dbCon,$query);
?>