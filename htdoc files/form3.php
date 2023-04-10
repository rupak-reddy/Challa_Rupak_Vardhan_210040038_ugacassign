<?php
include('connect.php');
session_start();
$errors = array('username'=>'', 'password'=>'');
if (isset($_GET['submit'])){
    if(empty($_GET['username'])){
        $errors['username'] = 'Username is required';
    }
    if(empty($_GET['password'])){
        $errors['password'] = 'Password is required';
    }

if (array_filter($errors)){
}else{
    $username_1 = mysqli_real_escape_string($conn, $_GET['username']);
    $password_1 = mysqli_real_escape_string($conn, $_GET['password']);
    $data = "SELECT id FROM user_details WHERE username='$username_1'";
    $result = mysqli_query($conn,$data);
    $details = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $_SESSION['id'] = $details['id'];
    mysqli_close($conn);
    header('Location: blog.php');
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="/blog.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kavivanar&display=swap" rel="stylesheet">
</head>
<body>
<div class="container bg-dark">
        <video autoplay loop muted id="myVideo">
            <source src="typing_1.mp4" type="video/mp4">
        </video>
        </div>
    <div class="container-fluid bg-dark">
        <nav class="navbar navbar-expand-sm bg-*">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
            <img src="/iitb_logo.png" alt="iitb_logo" width="25%" height="25%">
            </a>
        </div>
        <div class="container">
            <span class="navbar-text text-warning text-center" style="font-family: 'Kavivanar', cursive; font-size:xx-large;">Basic Discussion Forum - IITB</span>
        </div>
        <div class="container justify-content-end">
        <form class="d-flex">
            <div class="container">
            <button class="btn btn-danger" type="button"><a href="/form2.php" class="link-light">Sign Up</a></button>
        </div>
    </nav>
    </div>
        <div class="container bg-primary signin" style="width: 35%;">
            <form action="form3.php" method="GET">
                <div class="mb-3 mt-3">
                <div class="container">
                    <h6>Your account has been successfully created. Now please Login to your account</h6>
                </div>
                <br>
                  <label for="username" style="font-size:20px">Username:</label>
                  <input type="text" class="form-control" id="username" placeholder="Enter your Username" name="username" required>
                </div>
                <div class="mb-3">
                  <label for="pwd" style="font-size:20px">Password:</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                </div>
                <div class="container" style="width:20%">
                <input type="submit" class="btn btn-warning form-control" name="submit" value="Submit"></input>
                </div>
              </form>

        </div>
</body>
</html>