<?php
include 'db.php'; // Include the database connection

// Check if the ID is passed in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the delete query
    $query = "DELETE FROM users WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        // Redirect back to index.php after successful deletion
        header('Location: index.php');
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No ID provided for deletion.";
}
?>
