<?php
// Delete Task related to a Particular Id
include 'C:\xampp\htdocs\PHP Programming\To_Do_List\php\database.php';
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM tasks WHERE id=$id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header('location: ../pages/index.php');
    }
}
