<?php

session_start();
require "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $reg_no = $_POST["reg_no"];
    $password = $_POST["password"];

    $stmt = mysqli_prepare(
        $conn,
        "SELECT reg_no, password, name
         FROM students
         WHERE reg_no = ?"
    );

    mysqli_stmt_bind_param($stmt, "s", $reg_no);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {

        if (password_verify($password, $row["password"])) {

            $_SESSION["reg_no"] = $row["reg_no"];
            $_SESSION["name"] = $row["name"];

            header("Location: feedback.php");
            exit();

        } else {
            $message = "Invalid username or password";
        }

    } else {
        $message = "Invalid username or password";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container">
<div class="card">

<h2 style = "text-align:center">Student Login</h2>

<?php
if ($message != "") {
    echo '<p class="message">'.htmlspecialchars($message).'</p>';
}
?>

<form method="post">
    <div class="form-group">
        <label>Register Number:</label>
        <input type="text" name="reg_no" required>
    </div>
    <br><br>

    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password" required>
    </div>
    
    

    <br><br>

    <input type="submit" value="Login"><br><br>
    <a style = "font-size:15px" href="sign_up.php">
        Dont have an Account ?
    </a>
</form>
</div>
</div>

</body>
</html>