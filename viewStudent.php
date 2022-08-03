<!-- echo '<td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2F4F4F" class="bi bi-pencil-square" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></td>';
echo '<td><a href="./deleteStudent.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#B22222" class="bi bi-x-square-fill" viewBox="0 0 16 16">
<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
</svg></a></td>'; -->

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