<?php
// Assume you have a database connection established
include "db_conn.php";

// Fetch all students from the 'student' table
$allStudentsQuery = "SELECT * FROM student";
$allStudentsResult = mysqli_query($conn, $allStudentsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Payment Status</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px;
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
            background-color: whitesmoke;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            background-color: #95afc0;
        }

        th {
            background-color: #7f8fa6;
        }
    </style>
</head>
<body>

    <body style="background-color: #487eb0;"></body>
    <h2 style="text-align: center;"><br><br><br><br>List of All Students</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Payment Status</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($allStudentsResult)) { ?>
            <tr>
                <td><?php echo isset($row['studID']) ? $row['studID'] : 'N/A'; ?></td>
                <td><?php echo isset($row['studName']) ? $row['studName'] : 'N/A'; ?></td>
                <td><?php echo isset($row['studEmail']) ? $row['studEmail'] : 'N/A'; ?></td>
                <td><?php echo isset($row['payment_status']) ? $row['payment_status'] : 'N/A'; ?></td>
            </tr>
        <?php } ?>

    </table>

</body>
</html>
