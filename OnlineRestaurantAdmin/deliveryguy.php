<?php
require_once "config.php";

$username = $age = $address = $email = $contact = "";
$username_err = $age_err = $address_err = $email_err = $contact_err =  "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if restaurant name is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = " username cannot be blank";
    } else {
        $sql = "SELECT id FROM delguy WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set the value of param restaurant
            $param_username = trim($_POST['username']);
            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went wrong";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Check for Age
    if (empty(trim($_POST["age"]))) {
        $age_err = "Age cannot be blank";
    } else {
        $age = trim($_POST["age"]);
    }

    // Check for address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Address cannot be blank";
    } else {
        $address = trim($_POST["address"]);
    }

    // Check for Email
    if (empty(trim($_POST["email"]))) {
        $email_err = "email cannot be blank";
    } else {
        $email = trim($_POST["email"]);
    }

    // Check for phone
    if (empty(trim($_POST["phone"]))) {
        $contact_err = "phone cannot be blank";
    } else {
        $contact = trim($_POST["phone"]);
    }



    // If there were no errors, go ahead and insert into the database
    if (empty($username_err) && empty($age_err) && empty($address_err) && empty($email_err) && empty($contact_err)) {
        $sql = "INSERT INTO delguy (username, age, address,  email, contact) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_age, $param_address, $param_email, $param_contact);

            // Set thse parameters
            $param_username = $username;
            $param_age = $age;
            $param_address = $address;
            $param_email = $email;
            $param_contact = $contact;


            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location: adminaccess.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($conn);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title></title>
</head>

<body style="background-color: #970515;">
    <div>
        <!--Navigation-->
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: black;">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <?php echo '<a style="color: white;" href="adminaccess.php">Home</a>' ?>
                    </li>
                </ul>
                <li class="nav-item">
                    <?php echo '<a style="color: white;" class="btn btn-danger" href="logout.php">Logout</a>;' ?>
                </li>
            </div>
        </nav>
        <div class="container my-5" style="color: white;">
            <form action="" method="post">
                <!--Name-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Delivery guy name</label>
                        <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Name">
                    </div>
                    <!--Age-->
                    <div class="form-group mx-2">
                        <label for="inputAddressess2">Age</label>
                        <input type="text" class="form-control" name="age" id="inputAddressess2" placeholder="Age">
                    </div>
                </div>
                <!--Address-->
                <div class="form-group">
                    <label for="inputAddressess2">Address</label>
                    <input type="text" class="form-control" name="address" id="inputAddressess2" placeholder="Address">
                </div>
                <!--Email-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="name@gmail.com" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your sensitive information with anyone else.</small>
                        </div>
                    </div>
                    <!--Contact-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputAddressess2">Contact</label>
                            <input type="text" class="form-control" name="phone" id="inputAddressess2" placeholder="Contact No">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>