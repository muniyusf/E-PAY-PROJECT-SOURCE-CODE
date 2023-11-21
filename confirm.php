<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CONFIRM PAYMENT</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 0px;
            align-items: center;
            margin-bottom: 5px;
            margin-left: auto;
            margin-right: auto;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px 40px;
            text-align: center;
            font-size: 14px;
            align-items: center;
        }

        .center-table {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            margin-top: 70px;
        }
    </style>
</head>

<body style="background-color: #dcdde1;">

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "test_db";

    // Create the connection
    $conn = new mysqli($servername, $username, $password, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    if (isset($_SESSION['user_name'])) {
        $user_name = $_SESSION['user_name'];  // Corrected variable name

        // Create and execute a query to fetch information for the logged-in student
        $query = "SELECT * FROM student WHERE user_name = '$user_name'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_name = $row['user_name'];
            $password = $row['password'];
            $studName = $row['studName'];
            $studID = $row['studID'];
            $studIntake = $row['studIntake'];
            $studCourse = $row['studCourse'];
            $studEmail = $row['studEmail'];
            $refNumber = $row['refNumber'];
        } else {
            echo "Student information does not found.";
        }
    } else {
        echo "Student Email has not been set yet.";
    }

    // Close the database connection
    $conn->close();
    ?>

    <table>
        <tr>
            <td colspan="2" style="background-color: #60a3bc">
                <h2 style="text-align: center;"><strong>STUDENT DETAIL</strong></h2>
            </td>
        </tr>
        <tr>
            <td>
                <p style="text-align:center;">Student Name</p>
            </td>
            <td>
                <p style="text-align:center;"><?php echo $studName; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p style="text-align:center;">ID Number</p>
            </td>
            <td>
                <p style="text-align:center;"><?php echo $studID; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p style="text-align:center;">Course</p>
            </td>
            <td>
                <p style="text-align:center;"><?php echo $studCourse; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p style="text-align:center;">Email</p>
            </td>
            <td>
                <p style="text-align:center;"><?php echo $studEmail; ?></p>
            </td>
        </tr>
    </table>

    <br><br>

    <table>
        <tr>
            <td colspan="2" style="background-color: #60a3bc">
                <h2 style="text-align: center;"><strong>PAYMENT DETAIL</strong></h2>
            </td>
        </tr>
        <tr>
            <td>Reference Number</td>
            <td><?php echo $refNumber; ?></td>
        </tr>
        <tr>
            <td>Total Amount</td>
            <td>
                <?php
                // Retrieve the totalAmount from the URL parameter
                $totalAmount = isset($_GET['totalAmount']) ? $_GET['totalAmount'] : 'N/A';

                // Display the totalAmount
                echo "RM: $totalAmount";
                ?>

                <br><br>

                <form action="bank.php" method="post">
                    <input type="button" value="Cancel" onclick="window.location='student.php'" />
                    <input type="hidden" name="totalAmount" value="<?php echo $totalAmount; ?>">
                    <button type="submit">Confirm</button>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>
