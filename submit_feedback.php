<?php

session_start();

if (!isset($_SESSION["reg_no"])) {
    header("Location: login.php");
    exit();
}

require "db.php";

$reg_no = $_SESSION["reg_no"];

$teaching = $_POST["teaching_rating"];
$clarity = $_POST["clarity_rating"];
$material = $_POST["material_rating"];
$interaction = $_POST["interaction_rating"];
$comments = $_POST["comments"];

$overall = (
    $teaching +
    $clarity +
    $material +
    $interaction
) / 4;

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO feedback
    (reg_no, teaching_rating, clarity_rating, material_rating,
     interaction_rating, overall_rating, comments)
    VALUES (?, ?, ?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "siiiids",
    $reg_no,
    $teaching,
    $clarity,
    $material,
    $interaction,
    $overall,
    $comments
);

if (mysqli_stmt_execute($stmt)) {
    $file = fopen("data/feedback.txt", "a");

    $feedback_text =
        "========================================\n" .
        "              FEEDBACK\n" .
        "========================================\n" .
        "Register Number: " . $reg_no . "\n" .
        "Teaching Quality: " . $teaching . "\n" .
        "Clarity: " . $clarity . "\n" .
        "Course Material: " . $material . "\n" .
        "Interaction: " . $interaction . "\n" .
        "Overall Rating: " . $overall . "\n" .
        "Comments: " . $comments . "\n" .
        "Submitted: " . date("Y-m-d H:i:s") . "\n" .
        "========================================\n\n";

    fwrite($file, $feedback_text);

    fclose($file);
    header("Location: view_feedback.php");
    exit();

} else {

    echo "Error: " . mysqli_error($conn);

}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>