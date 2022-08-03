<?php

require './dbConnection.php';
$id = $_REQUEST['id'];
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

// UPDATE Customers
// SET ContactName = 'Alfred Schmidt', City = 'Frankfurt'
// WHERE CustomerID = 1;

$sql = "UPDATE student_details
SET name='$name',
phone='$phone',
email='$email',
dob='$dob',
address='$address',
zip='$zip',
city='$city',
state='$state',
country='$country',
image='$image'
WHERE id = $id";

if (mysqli_query($dbCon, $sql)) {
    echo "<h3>data updated in a database successfully."
        . " Please browse your localhost php my admin"
        . " to view the updated data</h3>";

    echo nl2br("\n$name\n $phone\n "
        . "$email\n $dob\n $address \n $zip\n $city\n $state \n$country \n$image");
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($dbCon);
}

mysqli_close($dbCon);

?>
