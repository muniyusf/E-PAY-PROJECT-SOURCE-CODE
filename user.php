<!DOCTYPE html>
<html>
<head>
	<title>USER MANUAL</title>
</head>
<style>
    body {
            background-color: #dcdde1;
            overflow-x: hidden;
            text-align: center;
        }

        .centre-rcorners {
            justify-content: center;
            align-items: center;
            height: 100vh; /* Make it full height of the viewport */
            margin: 0; /* Remove default margin */
            margin-left: 180px;
        }

        .rcorners {
            border-radius: 25px;
            border: 2px solid black;
            padding: 20px;
            width: 800px; /* Set a fixed width */
            height: 500px; /* Set a fixed height */
            text-align: center;
            margin: 10px;        
        }

        .back-button 
        {
        	background-color:#40739e;
    		color: white;
    		font-size: 14px;
    		padding: 10px 20px;
    		border: none;
    		cursor: pointer;
    		transition: background-color 0.4s ease;
    		margin-bottom: 30px;
    		margin-left: 0px;
    		margin-right: 150px;
    		border-radius: 10px;
		}

		.back-button:hover 
		{
			background-color: #7f8fa6;
		}

    </style>

<body>
    <div class="centre-rcorners">
        <p class="rcorners" id="rcorners1"><br><br><br><br><br><br><b>WELCOME</b><br><br><img src="MARA-UPTM 2.png" width="380" height="150" style="text-align: center;"><br><br><br>Welcome to UPTM EPAY System. This is the user manual. Please go through until the last step.</p><br><br>

        <p class="rcorners" id="rcorners2"><br><br><b>STEP 1</b><br><br>Please <b>login</b> first to continue the EPAY System. Enter your <b>email</b> and <b>password</b> to log in. Student's email is provided by UPTM only.<br><br><br><img src="login.png" width="400" height="280" style="text-align: center;"></p><br><br>

        <p class="rcorners" id="rcorners3"><br><br><b>STEP 2</b><br><br>After successfully logging in, please make sure your <b>details</b> are correct.<br><br><br><img src="detail.png" width="610" height="240" style="text-align: center;"></p><br><br>

        <p class="rcorners" id="rcorners4"><br><br><b>STEP 3</b><br><br>Scroll down to make a payment. Please <b>select an item</b> to pay by clicking on the item label and enter the amount to pay. If you're not sure about the fees, please refer here <a href="payment.php">Payment Reference.</a><br><img src="fees.png" width="540" height="300" style="text-align: center;"></p><br><br>

        <p class="rcorners" id="rcorners5"><br><br><b>STEP 4</b><br><br>Please check the <b>payment amount</b> and click the <b>confirm</b> button.<br><img src="confirm.png" width="540" height="300" style="text-align: center;"></p><br><br>

        <p class="rcorners" id="rcorners6"><br><br><b>STEP 5</b><br><br>Please make sure the payment <b>total amount</b> is <b>correct</b> and click the <b>confirm</b> button to make payment.<br><img src="total2.png" width="580" height="310" style="text-align: center;"></p><br><br>

        <p class="rcorners" id="rcorners7"><br><br><b>STEP 6</b><br><br>Please make sure the payment <b>total amount</b> is <b>correct</b>, select the <b>preferred bank</b> for payment, and click <b>confirm</b>.<br><br><br><img src="pay2.png" width="670" height="300" style="text-align: center;"></p><br><br>

        <p class="rcorners" id="rcorners8"><br><br><b>STEP 7</b><br><br>You will be redirected to the online banking login page. Log in with your user information to make payment. Check the amount and proceed with the payment.<br><br><br><img src="bankislam.png" width="570" height="300" style="text-align: center;"></p><br><br>

        <p class="rcorners" id="rcorners9"><br><br><b>STEP 8</b><br><br>Once the payment is complete, it will show you the transaction summary. Please keep the reference number you received on your email.<br><br><br><img src="logout.png" width="590" height="300" style="text-align: center;"></p><br><br>

		<button value="Back" class="back-button" onclick="history.back()">Back</button>
	</div>
    </div>
</body>
</html>