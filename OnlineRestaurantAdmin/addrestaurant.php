<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
require_once "config.php";

$resname = $address = $email = $phone  =  "";
$resname_err = $address_err = $email_err = $phone_err =  "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if restaurant name is empty
    if (empty(trim($_POST["resname"]))) {
        $resname_err = "Restaurant name cannot be blank";
    } else {
        $sql = "SELECT id FROM restaurants WHERE resname = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_resname);
            // Set the value of param restaurant
            $param_resname = trim($_POST['resname']);
            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $resname_err = "This restaurant name is already taken";
                } else {
                    $resname = trim($_POST['resname']);
                }
            } else {
                echo "Something went wrong";
            }
            mysqli_stmt_close($stmt);
        }
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
        $phone_err = "phone cannot be blank";
    } else {
        $phone = trim($_POST["phone"]);
    }




    // If there were no errors, go ahead and insert into the database
    if (empty($resname_err) && empty($address_err) && empty($email_err) && empty($phone_err)) {
        $sql = "INSERT INTO restaurants (resname, address, email, phone) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $param_resname, $param_address, $param_email, $param_phone);

            // Set thse parameters
            $param_resname = $resname;
            $param_address = $address;
            $param_email = $email;
            $param_phone = $phone;




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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Add Restaurants</title>
</head>

<body style="background-color: #282828;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item  mx-2 my-3">
                    <?php echo '<a style="color: white;" href="index.php">Home</a>;' ?><span class="sr-only">(current)</span>
                </li>
                <li class="nav-item mx-2 my-3">
                    <?php echo '<a style="color: white;" href="about.php">About us</a>;' ?>
                </li>
                <li class="nav-item active mx-2 my-3">
                    <?php echo '<a style="color: white;" href="phone.php">phone us</a>;' ?>
                </li>
                <li class="nav-item mx-2 my-3">
                    <?php echo '<a style="color: white;" href="feedback.php">Feedback</a>;' ?>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-2  mx-2">
                <input class="form-control mr-sm-2" type="search" placeholder="Search for your favourite restaurants" aria-label="Search">
                <button class="btn btn-outline-success my-5 my-sm-0" type="submit">Search</button>
            </form>
            <li class="nav-item">
                <?php echo '<a style="color: white;" href="Register.php">Login</a>;' ?>
            </li>
            <li class="nav-item">
                <?php echo '<a style="color: white;" href="Register.php">Register</a>;' ?>
        </div>
    </nav>
    <div class="container my-5" style="color: white;">
        <form action="" method="post">
            <!--Name-->
            <div class="row my-5">
                <div class="form-group col-md-4 my-4">
                    <label for="inputEmail4">Restaurant name</label>
                    <input type="text" class="form-control" name="resname" id="inputEmail4" placeholder="Name">
                </div>
                <!--Address-->
                <div class="col-md-6 form-group my-4">
                    <label for="inputAddressess2">Address</label>
                    <input type="text" class="form-control" name="address" id="inputAddressess2" placeholder="Restaurant's address">
                </div>
            </div>
            <!--Email-->
            <div class="row">
                <div class="col-4 form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="name@gmail.com" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your sensitive information with anyone else.</small>
                </div>
            </div>
            <!--phone-->
            <div class="row">
                <div class="col-4 form-group my-4">
                    <label for="inputAddressess2">Phone no</label>
                    <input type="text" class="form-control" name="phone" id="inputAddressess2" placeholder="Phone No.">
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>