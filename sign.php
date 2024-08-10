<?php

$succes = 0;
$user = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "select * from `registration` where username='$username'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // echo "User already exist";
            $user = 1;
        } else {
            $sql = "insert into `registration`(username,password) values('$username','$password')";

            $result = mysqli_query($con, $sql);
            if ($result) {
                // echo "Signup Successfully";
                $succes = 1;
            } else {
                die(mysqli_error($con));
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php
    if ($user) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oh- Sorry! </strong> Data is Already Exists.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <?php
    if ($succes) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Yes-Great! </strong>Sugnup Successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>

    <h1 class="text-center">SignUp Page</h1>
    <div class="container mt-5">
        <form action="sign.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

</body>

</html>