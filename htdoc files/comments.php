<?php 
include('connect.php');
session_start();
$old_id = $_SESSION['id'];
$data = "SELECT * FROM user_details WHERE id='$old_id'";
$result = mysqli_query($conn, $data);
$details = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
if (isset($_GET['id'])){
    $latest_id = $_GET['id'];
}
$errors = array('comments'=>'');
if (isset($_POST['submit'])){
    if(empty($_POST['comment'])){
        $errors['comments'] = 'Comment is required';
    }

if (array_filter($errors)){
}else{
    $comments_1 = mysqli_real_escape_string($conn3, $_POST['comment']);
    $new=$details['name'];
    $id=$latest_id;
    $insert_new = "INSERT INTO comments(id, commented, name) VALUES('$latest_id', '$comments_1','$new')";
    if (mysqli_query($conn3, $insert_new)){
    }else{
        echo "Error accessing the Database";
    }
}
}
$data_new_1 = "SELECT * FROM comments";
$result_new_1 = mysqli_query($conn3,$data_new_1);
$details_new_1 = mysqli_fetch_all($result_new_1,MYSQLI_ASSOC);
mysqli_free_result($result_new_1);
mysqli_close($conn3);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kavivanar&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@500&display=swap" rel="stylesheet">
</head>
<body style="background-color:skyblue">
    <div class="container-fluid bg-dark">
<nav class="navbar navbar-expand-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="">
        <img src="/iitb_logo.png" alt="iitb_logo" width="15%" height="15%">
        </a>
    </div>
    <div class="container ">
        <span class="navbar-text text-white text-center" style="font-family: 'Kavivanar', cursive; font-size:xx-large;">Basic Discussion Forum - IITB</span>
    </div>
    <div class="container justify-content-end">
        <span class="navbar-text text-white text-center" style="font-family: 'Alkatra', cursive; font-size:xx-large;">Hello <?php echo ($details['name']); ?> </span>
    </div>
    <form class="d-flex">
            <div class="container">
            <button class="btn btn-danger" type="button"><a href="logout.php" class="link-light">Logout</a></button>
        </div>
</form>
    </div>
<br>
<?php foreach ($details_new_1 as $information) { ?>
<div class="card bg-warning">
    <div class="card-header">Comment:</div>
    <div class="card-body"><?php echo $information['commented']; ?></div> 
    <div class="card-footer">Commented by <?php echo $information['name']; ?> at <?php echo $information['time_created']; ?>.</div>
  </div>

  <?php } ?>
  </div>
  <div class="container">
        <h3 class="text-center">Post some comment</h3>
            <form action="comments.php" method="POST">
                <div class="mb-3 mt-3">
                <label for="comment" style="font-size:20px">Comment:</label>
                <textarea class="form-control" rows="5" id="comment" placeholder="Enter your comment" name="comment" required></textarea>
                </div>
                <div class="container" style="width:20%">
                <input type="submit" class="btn btn-success form-control" name="submit" value="Submit"></input>
                </div>
              </form>

        </div>
<br>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark bottom">
    <div class="container">
        <span class="navbar-text text-white" style="font-family: 'Inconsolata', monospace; font-size:x-large"><span style="color:white ; font-size:30px;">&copy;</span> Copyright 2023, IIT Bombay</span>
    </div>
    <div class="container justify-content-end">
        <span class="navbar-text text-white" style="font-family: 'Edu NSW ACT Foundation', cursive; font-size:x-large">Created and Designed with <span style="color:red ; font-size:25px;">&hearts;</span> by Challa Rupak Vardhan</span>
    </div>
    </nav>
</body>
</html>

