<?php
session_start();
include "db_conn.php";

if (isset($_POST['user_name']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['user_name']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: login.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM admin WHERE user_name='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_name'] = $row['user_name'];
                header("Location: epay.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect User name or password");
                exit();
            }
        } else {
            header("Location: login.php?error=Database error. Please try again.");
            exit();
        }
    }
} else {
    header("Location: admin.php");
    exit();
}
?>
