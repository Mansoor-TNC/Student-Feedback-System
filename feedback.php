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
</head>

<body>

<h2>Student Feedback Form</h2>

<p>Welcome <?php echo strtoupper($_SESSION["name"]); ?></p>

<form action="submit_feedback.php" method="post">

    <label>Teaching Quality:</label>
    <select name="teaching_rating" required>
        <option value="">Select Rating</option>
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">3 - Average</option>
        <option value="4">4 - Good</option>
        <option value="5">5 - Excellent</option>
    </select>

    <br><br>

    <label>Clarity of Explanation:</label>
    <select name="clarity_rating" required>
        <option value="">Select Rating</option>
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">3 - Average</option>
        <option value="4">4 - Good</option>
        <option value="5">5 - Excellent</option>
    </select>

    <br><br>

    <label>Course Material:</label>
    <select name="material_rating" required>
        <option value="">Select Rating</option>
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">3 - Average</option>
        <option value="4">4 - Good</option>
        <option value="5">5 - Excellent</option>
    </select>

    <br><br>

    <label>Student Interaction:</label>
    <select name="interaction_rating" required>
        <option value="">Select Rating</option>
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">Average</option>
        <option value="4">Good</option>
        <option value="5">Excellent</option>
    </select>

    <br><br>

    <label>Comments:</label>
    <br>
    <textarea name="comments" placeholder="Enter NIL if there is no comments about the Faculty" rows="5" cols="40" required></textarea>

    <br><br>

    <input type="submit" value="Submit Feedback">

</form>

</body>
</html>
