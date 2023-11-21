<?php
$totalAmount = isset($_POST['totalAmount']) ? $_POST['totalAmount'] : 'N/A';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BANK DETAILS</title>
</head>

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

// Retrieve user information from sessions or URL parameters
$user_name = $_SESSION['user_name'];
$totalAmount = $_POST['totalAmount']; // Ensure you have this value from your form

if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];  // Corrected variable name

    // Create and execute a query to fetch information for the logged-in student
    $query = "SELECT * FROM student WHERE user_name = '$user_name'";
    $result = $conn->query($query);


   if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
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
   <style>
        table 
        {
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
        .box
        {
            border: 2px solid black;
            margin: auto;  
            padding: 20px;
            text-align: center;
            margin-left: 120px;
            margin-right: 120px;
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
   <br><br><br>
<table>
    <body>
    <div>
    	<tr>
    		<td colspan="2" style="background-color: #60a3bc"><h2 style="text-align: center;"><strong>PAYMENT DETAIL</strong></h2></td>
		</tr>
		<tr>
			<td>Reference Number</td>
            <td><?php echo $refNumber; ?></td>
		</tr>
		<tr>
    <td>Total Amount</td>
    <td>
        <?php
        echo "RM: $totalAmount";
        ?>
    </td>
</tr>
</div>
</table>

<br><br>

<p class="box" style="text-align:center;"><img src="paypal.png" width="200" height="130"></a>
    <br><br>

   <script>
    function confirmPayment() {
        var selectElement = document.getElementById('cars');
        var selectedBank = selectElement.options[selectElement.selectedIndex].value;

        // Update payment status and redirect to the bank
        updatePaymentStatus(selectedBank);
    }

    function updatePaymentStatus(selectedBank) {
        var updateUrl = 'update_payment_status.php';

        // Create a new FormData object
        var formData = new FormData();
        formData.append('selectedBank', selectedBank);

        // Use fetch API to send a POST request to the update URL
        fetch(updateUrl, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Log the response for debugging
                if (data.status === 'success') {
                    // Redirect to the confirmation page after updating the status
                    window.location.href = 'confirmation.php';
                } else {
                    // Handle the error condition
                    console.error('Failed to update payment status:', data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>




</head>
<body>
    <body style="background-color: #dcdde1;"></body>
     <select id="cars" name="cars" size="1" style="width: 40%;">
            <option value="alliance bank">Alliance Bank Malaysia Berhad</option>
            <option value="bank islam">Bank Islam Malaysia Berhad</option>
            <option value="bsn">Bank Simpanan Nasional</option>
            <option value="bank rakyat">Bank Rakyat</option>
            <option value="cimb">CIMB</option>
            <option value="hong leong">Hong Leong Bank</option>
            <option value="maybank">Maybank</option>
            <option value="rhb">RHB Bank</option>
        </select><br><br>

        <input type="button" value="Cancel" onclick="window.location='student.php'" />
        <button type="button" onclick="window.location='payment_success.php'" >Confirm</button>
        <!-- Logout Button -->
        <a href="logout.php" button id="logout-button" onclick="functionLogout()">
            <img src="logout2.png" alt="Logout">
        </a>

</html>