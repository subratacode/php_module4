<?php
session_start();
require './dbConnection.php';

$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$dob = $_REQUEST['dob'];
$address = $_REQUEST['address'];
$zip = $_REQUEST['zip'];
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$country = $_REQUEST['country'];
$image = $_REQUEST['image'];

var_dump($dob);
$error = false;
$currentDob = date('Y-m-d');

// dob validaiton
if($dob>$currentDob) {
    $dob_error_msg = "Please enter a valid date!";
    $error = true;
}

// zipcode validaiton
if(strlen($zip)!=6) {
    $zipcode_error_msg = "Please enter a valid zipcode of 6 digit number!";
    $error = true;
}

// password validation
// if (!preg_match("/^[a-zA-Z0-9]+$/", $password)) {
//     $password_error_msg = "Password must contain only alphanumeric and space";
//     $error = true;
// }

if(!$error) {
    $sql = "INSERT INTO student_details(name,phone,email,dob,address,zip,city,state,country,image) VALUES ('$name','$phone','$email','$dob','$address','$zip','$city','$state','$country','$image')";
    if (mysqli_query($dbCon, $sql)) {
        echo "<h3>data stored in a database successfully."
            . " Please browse your localhost php my admin"
            . " to view the updated data</h3>";
        echo nl2br("\n$name\n $phone\n "
            . "$email\n $dob\n $address \n $zip\n $city\n $state \n$country \n$image");
    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($dbCon);
    }
}
else {
    if(isset($dob_error_msg)) {
        $_SESSION['dob_error_msg'] = $dob_error_msg;
    }

    if(isset($zipcode_error_msg)) {
        $_SESSION['zipcode_error_msg'] = $zipcode_error_msg;
    }
    // if(isset($password_error_msg)) {
    //     $_SESSION['password_error_msg'] = $password_error_msg;
    // }
    header('location:addStudent.php');
}

mysqli_close($dbCon);
