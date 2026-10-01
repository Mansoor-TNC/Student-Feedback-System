<?php

session_start();

if (!isset($_SESSION["reg_no"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Feedback</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container">
<div class="navigation">
    <a href="view_feedback.php" class="button">
        My Feedback
    </a>

    <a href="logout.php" class="button">
        Logout
    </a>
</div>

<div class="card">

<h2 style="text-align:center">Student Feedback Form</h2>


<form action="submit_feedback.php" method="post">

    <div class="form-group">
    <label for="subject">Subject</label>

    <select name="subject" id="subject" required>
        <option value="">Select a subject</option>
        <option value="php">PHP</option>
        <option value="Database Management">Database Management Systems</option>
        <option value="Cloud Computing">Cloud Computing</option>
        <option value="Python">Python</option>
        <option value="Java">Java</option>
        <option value="C++">C++</option>
    </select>
    </div>

    <br><br>

    <div class="form-group">
        <label>Faculty:</label>

        <input
            type="text"
            name="faculty"
            placeholder="Enter faculty name"
            required>
    </div>

    <br><br>

    <div class="form-group">
    <label>Teaching Quality:</label>
    <select name="teaching_rating" required>
        <option value="">Select Rating</option>
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">3 - Average</option>
        <option value="4">4 - Good</option>
        <option value="5">5 - Excellent</option>
    </select>
    </div>

    <br><br>

    <div class="form-group">
    <label>Clarity of Explanation:</label>
    <select name="clarity_rating" required>
        <option value="">Select Rating</option>
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">3 - Average</option>
        <option value="4">4 - Good</option>
        <option value="5">5 - Excellent</option>
    </select>
    </div>

    <br><br>

    <div class="form-group">
    <label>Course Material:</label>
    <select name="material_rating" required>
        <option value="">Select Rating</option>
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">3 - Average</option>
        <option value="4">4 - Good</option>
        <option value="5">5 - Excellent</option>
    </select>
    </div>

    <br><br>

    <div class="form-group">
    <label>Student Interaction:</label>
    <select name="interaction_rating" required>
        <option value="">Select Rating</option>
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">Average</option>
        <option value="4">Good</option>
        <option value="5">Excellent</option>
    </select>
    </div>

    <br><br>

    <div class="form-group">
    <label>Comments:</label>
    <textarea name="comments" placeholder="Enter NIL if there is no comments about the Faculty" rows="5" cols="40" required></textarea>
    </div>
    <br><br>
    <input type="submit" value="Submit Feedback">

</form>

</div>
</div>

</body>
</html>
