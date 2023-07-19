<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        <?php include 'style.css'?>
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Edit User</h1>
            <div>
                <a href="index.php">Back</a>
            </div>
        </header>
        <form action="process.php" method="post">
            <?php
            if (isset($_GET['id'])) {
                include("connect.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM user_details WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
                <div class="form-element">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>" required>
                </div>
                <div class="form-element">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" value="<?php echo $row["age"]; ?>" required>
                </div>
                <div class="form-element">
                    <label for="position">Position</label>
                    <input type="text" id="position" name="position" value="<?php echo $row["position"]; ?>" required>
                </div>
                <div class="form-element">
                    <label for="password">password:</label>
                    <textarea id="password" name="password"><?php echo $row["password"]; ?></textarea>
                </div>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="form-element">
                    <input type="submit" name="edit" value="Edit User">
                </div>
                <?php
            } else {
                echo "<h3>User Does Not Exist</h3>";
            }
            ?>
        </form>
    </div>
</body>
</html>


<?php
include('connect.php');

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
