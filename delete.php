<?php
if (isset($_GET['id'])) {
    include("connect.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM user_details WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["delete"] = "User Deleted Successfully!";
        header("Location: index.php");
    } else {
        die("Something went wrong");
    }
} else {
    echo "User does not exist";
}
?>
