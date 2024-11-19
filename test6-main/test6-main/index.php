<?php
include 'db.php'; // Include the database connection

// Fetch all records from the users table
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Management</title>
</head>
<body>
    <div class="container">
        <h1>User Management</h1>
        <!-- Add New User Button -->
        <a href="create.php" class="btn">Add New User</a>

        <!-- User Data Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Course Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['middlename']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['course_section']; ?></td>
                            <td>
                                <!-- Edit Button -->
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                                <!-- Delete Button -->
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
