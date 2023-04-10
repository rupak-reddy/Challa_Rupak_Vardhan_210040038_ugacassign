<?php 
include('connect.php');
session_start();
$id_value = $_SESSION['id'];
$data = "SELECT * FROM user_details WHERE id='$id_value'";
$result = mysqli_query($conn, $data);
$details = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
$errors = array('title'=>'', 'description'=>'');
if (isset($_POST['submit'])){
    if(empty($_POST['title'])){
        $errors['title'] = 'Title is required';
    }
    if(empty($_POST['description'])){
        $errors['description'] = 'Description is required';
    }

if (array_filter($errors)){
}else{
    $title_1 = mysqli_real_escape_string($conn2, $_POST['title']);
    $description_1 = mysqli_real_escape_string($conn2, $_POST['description']);
    $name_1 = $details['name'];
    $insert_new = "INSERT INTO posts(title, description, name) VALUES('$title_1', '$description_1','$name_1')";
    if (mysqli_query($conn2, $insert_new)){
    }else{
        echo "Error accessing the Database";
    }
}
}
$data_new = "SELECT id, title, description, name FROM posts ORDER BY title";
$result_new = mysqli_query($conn2,$data_new);
$details_new = mysqli_fetch_all($result_new,MYSQLI_ASSOC);
mysqli_free_result($result_new);
mysqli_close($conn2);
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
    <div class="container">
        <h3 class="text-center">Add a New Post</h3>
            <form action="blog.php" method="POST">
                <div class="mb-3 mt-3">
                  <label for="title" style="font-size:20px">Title of the Post:</label>
                  <input type="text" class="form-control" id="title" placeholder="Enter the Title" name="title" required>
                </div>
                <div class="mb-3">
                <label for="description" style="font-size:20px">Description:</label>
                <textarea class="form-control" rows="5" id="description" placeholder="Enter the description" name="description" required></textarea>
                </div>
                <div class="container" style="width:20%">
                <input type="submit" class="btn btn-success form-control" name="submit" value="Submit"></input>
                </div>
              </form>

        </div>
<br>
<hr style="height:10px; width:100%;border-width:10px; background-color:black; color:black;"></hr>
<br>


    <div class="container">
    <h3 class="text-center">View Discussions</h3>
    <br>

    <div class="row row-cols-3 g-3">
    <?php foreach ($details_new as $information) { ?>
        <div class="col">
  <div class="card bg-warning" style="width:250px">
    <img class="card-img-top" src="/icon.jpeg" alt="Card image">
    <div class="card-body">
      <h4 class="card-title"><?php echo $information['title']; ?></h4>
      <p class="card-text"><?php echo $information['description']; ?></p>
      <h6 class="card-text">Originally Posted by <?php echo $information['name']; ?>.</h6>
      <a href="comments.php?id=<?php echo $information['id']; ?>" class="btn btn-primary">See in detail</a>
    </div>
  </div>
</div>
<br>
<?php } ?>
    </div>

<br></div>
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

