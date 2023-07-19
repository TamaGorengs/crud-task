<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redsify Users List</title>
    <style>
        <?php include 'style.css'?>
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Redsify Users List</h1>
            <div>
                <a href="create.php">Add New User</a>
            </div>
            <br>
        </header>
        
        <?php
        session_start();
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert">
            <?php echo $_SESSION["create"]; ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
        
        <?php
        if (isset($_SESSION["update"])) {
        ?>
        <div class="alert">
            <?php echo $_SESSION["update"]; ?>
        </div>
        <?php
        unset($_SESSION["update"]);
        }
        ?>
        
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert">
            <?php echo $_SESSION["delete"]; ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
        ?>
        
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Position</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('connect.php');
                $sqlSelect = "SELECT * FROM user_details";
                $result = mysqli_query($conn,$sqlSelect);
                while($data = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['age']; ?></td>
                        <td><?php echo $data['position']; ?></td>
                        <td><?php echo md5($data['password']); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
