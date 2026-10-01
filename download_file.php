<?php

session_start();

if (!isset($_SESSION["reg_no"])) {
    header("Location: login.php");
    exit();
}

$file = "data/feedback.txt";

if (file_exists($file)) {

    header("Content-Type: text/plain");
    header("Content-Disposition: attachment; filename=\"feedback.txt\"");
    header("Content-Length: " . filesize($file));

    readfile($file);

    exit();

} else {

    echo "You haven't provided any feedbacks yet.";

}

?>