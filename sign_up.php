<?php

require "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $reg_no = $_POST["reg_no"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {

        $message = "Passwords do not match.";

    } else {

        $stmt = mysqli_prepare(
            $conn,
            "SELECT reg_no FROM students WHERE reg_no = ?"
        );

        mysqli_stmt_bind_param($stmt, "s", $reg_no);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {

            $message = "Register Number already exists.";

        } else {

            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO students (reg_no, password, name)
                 VALUES (?, ?, ?)"
            );

            mysqli_stmt_bind_param(
                $stmt,
                "sss",
                $reg_no,
                $hashed_password,
                $name
            );

            if (mysqli_stmt_execute($stmt)) {

                header("Location: login.php");
                exit();

            } else {

                $message = "Something went wrong. Please try again.";
            }
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<head>

    <title>Student Signup</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

<div class="card">

    <h1 style = "text-align:center">Student Feedback System</h1>

    <h2 style = "text-align:center">
        Create your student account.
    </h2>

    <?php

    if ($message != "") {
        echo '<p class="message">' .
             htmlspecialchars($message) .
             '</p>';
    }

    ?>

    <form method="post">

        <div class="form-group">

            <label for="name">Name:</label>

            <input
                type="text"
                name="name"
                id="name"
                required>

        </div>

        <div class="form-group">

            <label for="reg_no">Register Number:</label>

            <input
                type="text"
                name="reg_no"
                id="reg_no"
                required>

        </div>

        <div class="form-group">

            <label for="password">Password:</label>

            <input
                type="password"
                name="password"
                id="password"
                required>

        </div>

        <div class="form-group">

            <label for="confirm_password">Confirm Password:</label>

            <input
                type="password"
                name="confirm_password"
                id="confirm_password"
                required>

        </div><br>

        <input type="submit" value="Create Account">

    </form><br>


    <a style = "font-size:15px" href="login.php">
        Back to Login
    </a>


</div>

</div>

</body>
</html>