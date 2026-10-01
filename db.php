<?php
    $conn = mysqli_connect("localhost", "root", "");
    if(!$conn){
        die("Connection Failed: ".mysqli_connect_error());
    }

    $sql = "CREATE DATABASE IF NOT EXISTS student_feedback";

    if (!mysqli_query($conn, $sql)) {
        die("Database creation failed: " . mysqli_error($conn));
    }

    mysqli_select_db($conn, "student_feedback");

    $sql = "CREATE TABLE IF NOT EXISTS students (
        reg_no VARCHAR(50) PRIMARY KEY,
        password VARCHAR(255) NOT NULL,
        name VARCHAR(100) NOT NULL
    )";

    if (!mysqli_query($conn, $sql)) {
        die("Students table creation failed: " . mysqli_error($conn));
    }

    $sql = "CREATE TABLE IF NOT EXISTS feedback (
        id INT AUTO_INCREMENT PRIMARY KEY,
        reg_no varchar(50) NOT NULL,
        subject VARCHAR(100) NOT NULL,
        faculty VARCHAR(100) NOT NULL,
        teaching_rating INT NOT NULL,
        clarity_rating INT NOT NULL,
        material_rating INT NOT NULL,
        interaction_rating INT NOT NULL,
        overall_rating DECIMAL(3,2) NOT NULL,
        comments TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

        FOREIGN KEY (reg_no) REFERENCES students(reg_no)
    )";

    if (!mysqli_query($conn, $sql)) {
        die("Feedback table creation failed: " . mysqli_error($conn));
    }
?>