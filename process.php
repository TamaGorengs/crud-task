<?php
include('connect.php');

if (isset($_POST["create"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $position = mysqli_real_escape_string($conn, $_POST["position"]);
    $age = mysqli_real_escape_string($conn, $_POST["age"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sqlInsert = "INSERT INTO user_details (name, age, position, password) VALUES ('$name', '$age', '$position', '$password')";

    if (mysqli_query($conn, $sqlInsert)) {
        session_start();
        $_SESSION["create"] = "User Added Successfully!";
        header("Location: index.php");
        exit();
    } else {
        die("Something went wrong");
    }
}

if (isset($_POST["edit"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $position = mysqli_real_escape_string($conn, $_POST["position"]);
    $age = mysqli_real_escape_string($conn, $_POST["age"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    $sqlUpdate = "UPDATE user_details SET name = '$name', position = '$position', age = '$age', password = '$password' WHERE id='$id'";

    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION["update"] = "User Updated Successfully!";
        header("Location: index.php");
        exit();
    } else {
        die("Something went wrong");
    }
}
?>
