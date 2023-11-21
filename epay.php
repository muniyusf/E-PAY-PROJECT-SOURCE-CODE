<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
        }

        #fullscreen-image {
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }

        .button-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .button {
            margin: 10px;
            padding: 15px 30px;
            font-size: 16px;
            cursor: pointer;
            background-color: #3c6382;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none; /* Remove default link styling */
            display: inline-block;
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
</head>
<body>


    <!-- Fullscreen Image -->
    <img id="fullscreen-image" src="blue.png" alt="Fullscreen Image">

    <!-- Button Container -->
    <div class="button-container">

      <h1 style="color: #0a3d62;">WELCOME TO EPAY UPTM</h1><br><br>

        <!-- Button 1 -->
        <a href="epay.php" class="button" onclick="function1()">Home</a>

        <!-- Button 2 -->
        <a href="user.php" class="button" onclick="function1()">User Manual</a>

        <!-- Button 3 -->
        <a href="contact.php" class="button" onclick="function2()">Contact Us</a>

        <!-- Button 4 -->
        <a href="payment.php" class="button" onclick="function3()">Payment Reference</a>

        <!-- Button 5 -->
        <a href="student.php" class="button" onclick="function3()">Student Payment</a>
    </div>

    <!-- Logout Button -->
    <a href="logout.php" button id="logout-button" onclick="functionLogout()">
        <img src="logout2.png" alt="Logout">
    </button>

</body>
</html>