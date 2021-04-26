<?php

include('config1.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--aos-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/homepage.css">

    <title>Someone contacted you</title>

</head>

<body style="background-color: #282828; color: white;">
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
                    <?php echo '<a style="color: white;" class="btn btn-danger" href="logout.php">Logout</a>' ?>
                </li>
            </div>
        </nav>

        <div class="container my-5" style="text-align: center;">
            <h3>Someone contacted you</h3>
        </div>
        <div class="row">
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <i class="fa fa-tags"></i> View
                        </h5>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-stripped table-bordered table-hover" style="color: white;">
                                <thead>
                                    <tr>
                                        <th>ID:</th>
                                        <th>Name:</th>
                                        <th>Email:</th>
                                        <th>Message:</th>
                                        <th>Sent at</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;

                                    $get_pro = "select * from contact";

                                    $run_pro = mysqli_query($conn, $get_pro);

                                    while ($row_pro = mysqli_fetch_array($run_pro)) {

                                        $pro_id = $row_pro['id'];

                                        $pro_name = $row_pro['name'];

                                        $pro_email = $row_pro['email'];

                                        $pro_message = $row_pro['message'];

                                        $pro_createdat = $row_pro['createdat'];

                                        $i++;

                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td> <?php echo $pro_name; ?></td>
                                            <td> <?php echo $pro_email; ?></td>
                                            <td> <?php echo $pro_message; ?></td>
                                            <td> <?php echo $pro_createdat; ?></td>

                                            <td>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 2 integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 3 crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>