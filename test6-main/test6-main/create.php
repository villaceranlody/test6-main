<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    // Insert the data into the database
    $query = "INSERT INTO users (firstname, middlename, lastname, age, address, course_section) 
              VALUES ('$firstname', '$middlename', '$lastname', $age, '$address', '$course_section')";
    if (mysqli_query($conn, $query)) {
        // Redirect to index.php after successful insertion
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add New User</title>
</head>
<body>
    <div class="container">
        <h1>Add New User</h1>
        <form action="create.php" method="POST">
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="middlename" placeholder="Middle Name">
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="number" name="age" placeholder="Age" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="text" name="course_section" placeholder="Course Section" required>
            <button class="btn" type="submit">Submit</button>
            <a href="index.php" class="btn delete">Cancel</a>
        </form>
    </div>
</body>
</html>
