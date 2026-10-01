<?php

session_start();

if (!isset($_SESSION["reg_no"])) {
    header("Location: login.php");
    exit();
}

require "db.php";

$reg_no = $_SESSION["reg_no"];

$result = mysqli_query(
    $conn,
    "SELECT teaching_rating, clarity_rating, material_rating,
            interaction_rating, overall_rating, comments, created_at
     FROM feedback
     WHERE reg_no = $reg_no
     ORDER BY created_at DESC"
);

?>

<!DOCTYPE html>
<html>

<head>
    <title>My Feedback</title>
</head>

<body>

<h2>My Submitted Feedback</h2>

<?php

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<hr>";

        echo "<p><strong>Teaching Quality:</strong> "
            . $row["teaching_rating"] . "</p>";

        echo "<p><strong>Clarity:</strong> "
            . $row["clarity_rating"] . "</p>";

        echo "<p><strong>Course Material:</strong> "
            . $row["material_rating"] . "</p>";

        echo "<p><strong>Interaction:</strong> "
            . $row["interaction_rating"] . "</p>";

        echo "<p><strong>Overall Rating:</strong> "
            . $row["overall_rating"] . "</p>";

        echo "<p><strong>Comments:</strong> "
            . $row["comments"] . "</p>";

        echo "<p><strong>Submitted:</strong> "
            . $row["created_at"] . "</p>";
    }

} else {

    echo "<p>You have not submitted any feedback yet.</p>";

}

mysqli_close($conn);

?>

</body>
</html>