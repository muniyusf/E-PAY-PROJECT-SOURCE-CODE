<title>STUDENT PAYMENT</title>

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
    } else {
        echo "Student information does not found.";
    }

} else {
    echo "Student Email has not been set yet.";
}

// Close the database connection
$conn->close();

?>

   <style>

        table {
            border-collapse: collapse;
            margin-top: 0px;
            align-items: center;
            margin-bottom: 5px;
            margin-left: auto;
            margin-right: auto;
        }
        table, th, td 
        {
            border: 1px solid black;
            padding: 8px 40px;
            text-align: center;
            font-size: 14px;
            align-items: center;
        }
        .center-table 
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
        }

        /* New styles for the Logout button */
        #logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            background: none;
            border: none;
        }

        #logout-button img {
            width: 100px; /* Adjust the width as needed */
            height: auto; /* Maintain the aspect ratio */
        }

</style>

<table>
<body>
    <body style="background-color: #dcdde1;"></body>
    <p style="text-align:center;"><img src="MARA-UPTM 2.png" width="400" height="160"></a></p>
    <form id="paymentForm" action="confirm.php" method="get" onsubmit="return confirmForm()">
    <div class="center-table">
        <tr>
            <td colspan="2" style="background-color: #60a3bc"><h2 style="text-align:center ;"><strong>STUDENT DETAIL</strong></h2></td>
        </tr>
        <tr>
            <td><p style="text-align:center;">Student Name</p></td>
            <td><p style="text-align:center;"><?php echo $studName; ?></p></td>
        </tr>
        <tr>
            <td><p style="text-align:center;">ID Number</p></td>
            <td><p style="text-align:center;"><?php echo $studID; ?></p></td>
        </tr>
        <tr>
            <td><p style="text-align:center;">Intake</td>
            <td><p style="text-align:center;"><?php echo $studIntake; ?></p></td>
        </tr>
        <tr>
            <td><p style="text-align:center;">Course</p></td>
            <td><p style="text-align:center;"><?php echo $studCourse; ?></p></td>
        </tr>
        <tr>
            <td><p style="text-align:center;">Email</p></td>
            <td><p style="text-align:center;"><?php echo $studEmail; ?></p></td>
        </tr>
        <tr>

        <td colspan="2"><p style="text-align:center;"><h3><b>Choose your payment items:</b></h3></p>
                       <label for="tuitionFees">Tuition Fees (RM):</label>
                        <input type="number" id="tuitionFees" name="tuitionFees" onchange="updateTotalAmount()" required><br><br>

                        <label for="adminFees">Administrative Fees (RM):</label>
                        <input type="number" id="adminFees" name="adminFees" onchange="updateTotalAmount()" required><br><br>

                        <label for="hostelFees">Hostel Fees (RM):</label>
                        <input type="number" id="hostelFees" name="hostelFees" onchange="updateTotalAmount()" required><br><br>

                        <label for="totalAmount">Total Amount (RM):</label>
                        <input type="text" id="totalAmount" name="totalAmount" readonly><br><br>

                        <button type="reset" value="Reset">Cancel</button>
                        <button type="submit" value="Confirm">Confirm</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>

    <script>
         function updateTotalAmount() {
        var tuitionFees = parseFloat(document.getElementById('tuitionFees').value) || 0;
        var adminFees = parseFloat(document.getElementById('adminFees').value) || 0;
        var hostelFees = parseFloat(document.getElementById('hostelFees').value) || 0;

        var totalAmount = tuitionFees + adminFees + hostelFees;
        document.getElementById('totalAmount').value = totalAmount.toFixed(2);
    }
    </script>

    <!-- Logout Button -->
    <a href="logout.php" button id="logout-button" onclick="functionLogout()">
        <img src="logout2.png" alt="Logout">
    </button>

</body>
</html>