<?php
//This script will handle login
session_start();

// check if the user is already logged in
if (isset($_SESSION['name'])) {
    header("location: adminaccess.php");
    exit;
}
require_once "config.php";

$name = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['name'])) || empty(trim($_POST['password']))) {
        $err = "Please enter name + password";
    } else {
        $name = trim($_POST['name']);
        $password = trim($_POST['password']);
    }


    if (empty($err)) {
        $sql = "SELECT id, name, password FROM adminregister WHERE name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_name);
        $param_name = $name;


        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $name, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // this means the password is corrct. Allow user to login
                        session_start();
                        $_SESSION["name"] = $name;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        //Redirect user to welcome page
                        header("location: adminaccess.php");
                    }
                }
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Online Restaurant System</title>
</head>

<body style="background-color: #282828;">

    <div style="color: white;" class="cover">
        <h3 class=" mx-5 my-5">Please login here as an admin:</h3>
        <hr>
        <form action="" method="post">
            <div class="container-fluid my-5">
                <div class="row mx-5 my-5">
                    <div class="col-md-2 my-5">
                        <div class="form-group my-5">
                            <label for="exampleInputEmail1">name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="col-md-2 my-5">
                        <div class="form-group my-5">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mx-5">Login</button><br>
                <a style="color: white;" class=" mx-5" href="adminregister.php">New?? Register first</a>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>