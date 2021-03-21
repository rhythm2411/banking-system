<?php 
    require_once('connection.php');
    session_start();

    $success_msg = $_SESSION['success_msg'];
    $sender_account_num = $_SESSION['sender_account_num'];
    $recipient_account_num = $_SESSION['recipient_account_num'];
    $amount = $_SESSION['amount'];
    $transaction_id = $_SESSION['transaction_id'];
    $timestamp = $_SESSION['transaction_time'];

    //taking out sender and reciever details
    $sql = "SELECT * FROM customers WHERE `account_num` = $sender_account_num";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $sender_name = $row['name'];
    
    $sql = "SELECT * FROM CUSTOMERS WHERE `account_num` = $recipient_account_num";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $recipient_name = $row['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciept</title>
    <link rel="stylesheet" href="public/CSS/styles.css">
</head>
<body>
    <div class="main">
        <div class="reciept-holder">
            <div class="reciept">
                <u>Transaction Reciept</u> </br>
                Transaction successful </br></br>

                Sender's name: <?php echo $sender_name; ?></br>
                Sender's A/C No: <?php echo $sender_account_num; ?></br>
                Recipient's name: <?php echo $recipient_name; ?></br>
                Recipient's A/C No: <?php echo $recipient_account_num; ?></br>
                Via: Cadence Bank</br>
                Amount: <?php echo $amount; ?>;</br>
                TID: <?php echo $transaction_id; ?></br>
                Transaction time: <?php echo $timestamp; ?></br>
            </div>
            <div class="button-container">
                <button onclick="window.print()" class="button">Print</button>
            </div>
            <div class="button-container">
                <a href="home-page.php"><button class="button">Back to homepage</button></a>
            </div>

        </div>
    </div>
    
</body>
</html>