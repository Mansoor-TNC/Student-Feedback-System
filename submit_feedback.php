<?php

session_start();

if (!isset($_SESSION["reg_no"])) {
    header("Location: login.php");
    exit();
}

$teaching = $_POST["teaching_rating"];
$clarity = $_POST["clarity_rating"];
$material = $_POST["material_rating"];
$interaction = $_POST["interaction_rating"];

$overall = (
    $teaching +
    $clarity +
    $material +
    $interaction
) / 4;

echo "Teaching Rating: " . $teaching . "<br>";
echo "Clarity Rating: " . $clarity . "<br>";
echo "Material Rating: " . $material . "<br>";
echo "Interaction Rating: " . $interaction . "<br>";

echo "Overall Rating: " . $overall;

?>