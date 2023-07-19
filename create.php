<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New User</title>
  <style>
    <?php include 'style.css'?>
  </style>
</head>


<body>
  <div class="container">
    <header>
      <h1>Add New User</h1>
      <div>
        <a href="index.php">Back</a>
      </div>
    </header>

    <form action="process.php" method="post">
      <div>
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Please enter your name">
      </div>
      <div>
        <label for="age">Age:</label>
        <input type="number" name="age" placeholder="How old are you?">
      </div>
      <br>
      <div>
        <label for="position">Position:</label>
        <input type="text" name="position" placeholder="What role are you in?">
      </div>
      <div>
        <label for="password">password:</label>
        <textarea name="password" id="password" placeholder="Please enter your password"></textarea>
      </div>
      <div>
        <input type="submit" name="create" value="Add User">
      </div>
    </form>
  </div>
</body>
</html>

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

?>