<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: adminindex.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Online Restaurant System</title>
</head>

<body style="background-color: #282828;">
    <div>
        <!--Navigation-->
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: black;">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item mx-2 my-2">
                        <h5 style="color: white;"><?php echo "Welcome " . $_SESSION['name'] ?>!</h5>
                    </li>
                </ul>
                <li class="nav-item">
                    <?php echo '<a style="color: white;" class="btn btn-danger" href="logout.php">Logout</a>;' ?>
                </li>
            </div>
        </nav>

        <h2 class="my-5" style="color: white; text-align: center;">Welcome to Admin Access Panel, Here you can edit
            literally anything </h2>
        <div class="container">
            <hr style="background-color: white;">
        </div>

        <!--<div class="container">
            <div class="row mb-2 my-5">
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title py-3 mbr-fonts-style display-5">
                            Edit restaurants</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Edit menu, pricing of the restaurants
                        </p>
                        <a href="addmenu.php" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                <div class="card p-3 col-12 col-md-6 col-lg-4 mx-5">
                    <div class="card">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title py-3 mbr-fonts-style display-5">
                            Add restaurants
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Add restaurants with their menu, prices and taxes</p>
                        <a href="addrestaurant.php" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>-->

        <div class="container">
            <div class="row mb-2 my-5">
                <div class="card p-3 col-6 col-md-6 col-lg-4">
                    <div class="card">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title py-3 mbr-fonts-style display-5">
                            Add delivery guy</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Add details like name age gender etc.
                        </p>
                        <a href="deliveryguy.php" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                <div class="card p-3 col-4 col-md-6 col-lg-4 mx-5">
                    <div class="card">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title py-3 mbr-fonts-style display-5">
                            Someone contacted you</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Click the button below to see if someone tried to contact you
                        </p>
                        <a href="contactrecieve.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mb-2 my-5">
                <div class="card p-3 col-4 col-md-6 col-lg-4">
                    <div class="card">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title py-3 mbr-fonts-style display-5">
                            Someone sent you a feedback
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Click the button below to see if someone gave a feedback
                        </p>
                        <a href="feedbackrecieve.php" class="btn btn-primary">View</a>
                    </div>
                </div>
                <div class="card p-3 col-4 col-md-6 col-lg-4 mx-5">
                    <div class="card">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title py-3 mbr-fonts-style display-5">
                            You recieved a new order</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Check new orders
                        </p>
                        <a href="orderrecieve.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mb-2 my-5">
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title py-3 mbr-fonts-style display-5">
                            Someone sent you a feedback
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Add restaurants with their menu, prices and taxes</p>
                        <a href="feedbackrecieve.php" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<div class="container" style="background-color: dimgray;">
    <!-- Footer -->
    <footer class="bd-footer text-muted">
        <div class="container-fluid p-3 p-md-5 my-5">
            <ul class="bd-footer-links">
                <li><a style="color: white;" href="https://twitter.com/JassieSingh28">Twitter</a></li>
                <li><a style="color: white;" href="https://www.instagram.com/jassie__singh28/?hl=en">Instagram</a>
                </li>
                <li><a style="color: white;" href="/about.html">About</a></li>
                <li><a style="color: white;" href="/TermsConditions.html">Terms & Conditions </li>
            </ul>
            <p>Designed and built by Jassie
            </p>
        </div>
    </footer>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>