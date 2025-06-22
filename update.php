<?php
include "db.php";

$id = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE leaves SET status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Leave status updated successfully!";
} else {
    echo "Error updating status: " . $conn->error;
}

$conn->close();
?>
