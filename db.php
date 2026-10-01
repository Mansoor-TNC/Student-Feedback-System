<?php
    $conn = mysqli_connect("localhost", "root", "", "students_feedback");
    if(!$conn){
        die("Connection Failed: ".mysqli_connect_error());
    }
?>