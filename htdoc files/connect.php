<?php
$conn = mysqli_connect('localhost', 'rupak', '12345678', 'login_details');
$conn2 = mysqli_connect('localhost', 'rupak', '12345678', 'blogs');
$conn3 = mysqli_connect('localhost', 'rupak', '12345678', 'discussion');

if (! $conn){
echo 'Connection error : ' . mysqli_connect_error();
}
if (! $conn2){
    echo 'Connection error : ' . mysqli_connect_error();
    }
    if (! $conn3){
        echo 'Connection error : ' . mysqli_connect_error();
    }
?>