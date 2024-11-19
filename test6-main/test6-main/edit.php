<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $query = "UPDATE users SET 
        firstname = '$firstname', 
        middlename = '$middlename', 
        lastname = '$lastname', 
        age = $age, 
        address = '$address', 
        course_section = '$course_section'
        WHERE id = $id";
    mysqli_query($conn, $query);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit User</title>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <input type="text" name="firstname" value="<?php echo $user['firstname']; ?>" placeholder="First Name" required>
            <input type="text" name="middlename" value="<?php echo $user['middlename']; ?>" placeholder="Middle Name">
            <input type="text" name="lastname" value="<?php echo $user['lastname']; ?>" placeholder="Last Name" required>
            <input type="number" name="age" value="<?php echo $user['age']; ?>" placeholder="Age" required>
            <input type="text" name="address" value="<?php echo $user['address']; ?>" placeholder="Address" required>
            <input type="text" name="course_section" value="<?php echo $user['course_section']; ?>" placeholder="Course Section" required>
            <button class="btn" type="submit" name="update">Update</button>
            <a href="index.php" class="btn delete">Cancel</a>
        </form>
    </div>
</body>
</html>
