<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Code to Retrieve Data from MySQL Database and Display in html Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-2 px-0 mx-3">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header py-3">
                    <h2>Fetching Student Data</h2>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Address</th>
                            <th scope="col">Zipcode</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Country</th>
                            <th scope="col">Image</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // $image = 'images/' . $_FILES['image']['name'];
                        require 'retriveData.php';
                        if (mysqli_num_rows($result) > 0) {
                            // OUTPUT DATA OF EACH ROW
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['phone']."</td>";
                                echo "<td>".$row['email']."</td>";
                                echo "<td>".$row['dob']."</td>";
                                echo "<td>".$row['address']."</td>";
                                echo "<td>".$row['zip']."</td>";
                                echo "<td>".$row['city']."</td>";
                                echo "<td>".$row['state']."</td>";
                                echo "<td>".$row['country']."</td>";
                                // echo '<td><img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width=70px/></td>';

                                echo "<td><img src='uploads/$row[image]' height='50px'></td>";

                                $editId = $row['id'];
                                echo '<td><a href="editStudent.php?id='.$editId.'">edit</a></td>';
                                // echo '<td><a href="deleteStudent.php?id=$row['id']">delete</a></td>';
                                $deleteId = $row['id'];
                                echo '<td><a href="deleteStudent.php?id='.$deleteId.'">delete</a></td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>