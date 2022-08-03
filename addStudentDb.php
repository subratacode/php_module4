<?php
    session_start();
    require './dbConnection.php';
    $error = false;

    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $dob = $_REQUEST['dob'];
    $address = $_REQUEST['address'];
    $zip = $_REQUEST['zip'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $country = $_REQUEST['country'];
    // $image = $_REQUEST['image'];

    // file upload as image and validating with most common extensions
    var_dump($_FILES); // dumping files
    // $target_dir = "uploads/";
    // $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (empty($_POST["image"])) {
        $imageError = "";
    } 
    else {
        $image = check_input($_POST["image"]);
        $allowed =  array('jpeg','jpg', "png", "gif", "bmp", "JPEG","JPG", "PNG", "GIF", "BMP");
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        if(!in_array($ext,$allowed)) {
            $dob_error_msg = "Please upload a valid image!";
            $error = true;
        }
    }

    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    // echo $target_file;

    // getting current date
    $currentDob = date('Y-m-d');

    // dob validation
    if($dob>$currentDob) {
        $dob_error_msg = "Please enter a valid date!";
        $error = true;
    }

    // zipcode validation
    if(strlen($zip)!=6) {
        $zipcode_error_msg = "Please enter a valid zipcode of 6 digit number!";
        $error = true;
    }

    // password validation
    // if (!preg_match("/^[a-zA-Z0-9]+$/", $password)) {
    //     $password_error_msg = "Password must contain only alphanumeric and space";
    //     $error = true;
    // }

    if(!$error && !empty($errors)) {
        $sql = "INSERT INTO student_details(`name`,`phone`,`email`,`dob`,`address`,`zip`,`city`,`state`,`country`,`image`) VALUES ('$name','$phone','$email','$dob','$address','$zip','$city','$state','$country','$image')";
        if (mysqli_query($dbCon, $sql)) {
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";
            echo nl2br("\n$name\n $phone\n "
                . "$email\n $dob\n $address \n $zip\n $city\n $state \n$country \n$image");
        }
        else {
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($dbCon);
        }
        echo "Success";
    }
    else {
        echo "Failed";
        // if(isset($dob_error_msg)) {
        //     $_SESSION['dob_error_msg'] = $dob_error_msg;
        // }
        // if(isset($zipcode_error_msg)) {
        //     $_SESSION['zipcode_error_msg'] = $zipcode_error_msg;
        // }
        // if(isset($image_error_msg)) {
        //     $_SESSION['image_error_msg'] = $image_error_msg;
        // }
        // if(isset($password_error_msg)) {
        //     $_SESSION['password_error_msg'] = $password_error_msg;
        // }
        // header('location:addStudent.php');
    }

mysqli_close($dbCon);
?>
