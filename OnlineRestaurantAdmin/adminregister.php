<?php //error_reporting(E_ALL ^ E_NOTICE); 
?>
<?php
require_once "config.php";

$name = $password = $confirm_password = $email =  $phone = $address = $gender = "";
$name_err = $password_err = $confirm_password_err = $email_err = $phone_err = $address_err = $gender_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {


    // Check if name is empty
    if (empty(trim($_POST["name"]))) {
        $name_err = "name cannot be blank";
    } else {
        $sql = "SELECT id FROM adminregister WHERE name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            // Set the value of param name
            $param_name = trim($_POST['name']);
            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $name_err = "This name is already taken";
                } else {
                    $name = trim($_POST['name']);
                }
            } else {
                echo "Something went wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);


    // Check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password cannot be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
    }

    // Check for confirm password field
    if (trim($_POST['password']) !=  trim($_POST['confirm_password'])) {
        $password_err = "Passwords should match";
    }


    // Check for email
    if (empty(trim($_POST['email']))) {
        $email_err = "Email cannot be blank";
    } else {
        $email = trim($_POST['email']);
    }

    // Check for phone
    if (empty(trim($_POST['phone']))) {
        $phone_err = "Phone cannot be blank";
    } else {
        $phone = trim($_POST['phone']);
    }

    // Check for address
    if (empty(trim($_POST['address']))) {
        $address_err = "Address cannot be blank";
    } else {
        $address = trim($_POST['address']);
    }

    // Check for gender
    if (empty(trim($_POST['gender']))) {
        $gender_err = "Gender cannot be blank";
    } else {
        $gender = trim($_POST['gender']);
    }

    // If there were no errors, go ahead and insert into the database
    if (empty($name_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($phone_err) && empty($address_err)  && empty($gender_err)) {
        $sql = "INSERT INTO adminregister (name, password, email, phone, address, gender) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_password, $param_email, $param_phone, $param_address, $param_gender);

            // Set these parameters
            $param_name = $name;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_email = $email;
            $param_phone = $phone;
            $param_address = $address;
            $param_gender = $gender;

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location: adminindex.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Online Restaurant system!</title>
</head>

<body style="background-color: #282828;">

    <div>
        <div class="container" style="color: white;">
            <div class="my-5">
                <h3>Please register as an admin first</h3>
                <hr>
                <form action="" method="post">

                    <!--Name-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">name</label>
                            <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="Name">
                        </div>

                        <!--Password-->
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputPassword4">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="inputPassword" placeholder="Confirm Password">
                            </div>
                        </div>
                        <!--Password-->
                    </div>

                    <!--Addressess-->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputAddressess2">Email </label>
                                <input type="email" class="form-control" name="email" id="inputAddressess2" placeholder="Enter your email id">
                            </div>
                        </div>
                    </div>
                    <!--Phone-->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputPassword4">Phone no</label>
                                <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="Enter your phone number">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputCity">Address</label>
                            <input type="text" class="form-control" name="address" id="inputCity" placeholder="Enter address">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity">Gender</label>
                            <input type="text" class="form-control" name="gender" id="inputCity" placeholder="Enter gender">
                        </div>
                    </div><br>
                    <button type="submit" name="submit" class="btn btn-primary">Sign in</button><br>
                    <a style="color: white;" href="adminindex.php">Already an admin?? Login</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>