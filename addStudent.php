<?php
require_once "dbConfig.php";
if ($inputDate>$currentDate) {
    $name_error = "Please enter a valid date";
    $error = true;
}
// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $email_error = "Please Enter Valid Email ID";
//     $error = true;
// }
// if (strlen($password) < 6) {
//     $password_error = "Password must be minimum of 6 characters";
//     $error = true;
// }
// if (strlen($mobile) < 10) {
//     $mobile_error = "Mobile number must be minimum of 10 characters";
//     $error = true;
// }
// if ($password != $cpassword) {
//     $cpassword_error = "Password and Confirm Password doesn't match";
//     $error = true;
// }
// if (!$error) {
//     if (mysqli_query($conn, "INSERT INTO users(name, email, mobile, password) VALUES('" . $name . "', '" . $email . "', '" . $mobile . "', '" . md5($password) . "')")) {
//         header("location: login.php");
//         exit();
//     } else {
//         echo "Error: " . $sql . "" . mysqli_error($conn);
//     }
// }
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Code to Retrieve Data from MySQL Database and Display in html Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2 px-5 py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card w-50">
                    <div class="card-header bg-primary text-light">
                        <h2>Add Student</h2>
                    </div>
                    <div class="card-body">
                        <form action="addStudentDb.php" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob">
                                <span class="text-danger"><?php if (isset($dob_error)) echo $dob_error; ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="mb-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="text" class="form-control" name="zip">
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" name="city">
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" name="state">
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" name="country">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <input type="submit" class="btn btn-primary my-3"></button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>