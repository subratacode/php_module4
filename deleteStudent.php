<?php
    require 'dbConnection.php';
    $id = $_GET['id'];
    echo $id;
    $sql = "DELETE FROM student_details WHERE id=$id";

if (mysqli_query($dbCon, $sql)) {
    echo "<h3>data of id : $id deleted from database successfully.</h3>";
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($dbCon);
}

mysqli_close($dbCon);
?>