
<?php 
    session_start();
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
                                <span class="text-danger"><?php if (isset($_SESSION['password_error_msg'])) echo $_SESSION['password_error_msg']; unset($_SESSION['password_error_msg']); ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="mb-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="text" class="form-control" name="zip">
                                <span class="text-danger"><?php if (isset($_SESSION['zipcode_error_msg'])) echo $_SESSION['zipcode_error_msg']; unset($_SESSION['zipcode_error_msg']); ?></span>
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