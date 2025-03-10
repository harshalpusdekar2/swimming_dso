<?php
session_start();
if (isset($_POST["submit"])) {
    $_SESSION['UID'] = $_POST['uid'];
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations Dialog</title>
    <style>
        /* Basic styles for the dialog */
        #congrats-dialog {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 50px;
            border: 2px solid #4CAF50;
            background-color: gray;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            text-align: center;
            border-radius: 10px;
        }
        #congrats-dialog h2 {
            margin-top: 0;
            color: white;
        }
        #congrats-dialog .close-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        #congrats-dialog .close-btn:hover {
            background-color: #45a049;
        }
        #congrats-dialog img {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
            background-color: gray;
        }
        /* Overlay to darken the background */
        #dialog-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        /* Sparkle effect */
        .sparkle {
            position: absolute;
            width: 10px;
            height: 10px;
            background: radial-gradient(circle, white 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%;
            animation: sparkle 1s infinite;
        }
        @keyframes sparkle {
            0%, 100% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
        }
    </style>
</head>
<body onload="showCongratsDialog('You have successfully Registered for Swimming!');"> 


<div id="dialog-overlay"></div>
<div id="congrats-dialog">
<form id="myForm" method="post" action="payment_confirmation.php">
<input type="text" id="uid" name="uid" value='<?php echo $_SESSION['uid']; ?>' hidden >
   <input type="text" id="first_name" name="firstname" value='<?php echo $_SESSION['first_name']; ?>' hidden/>
   <input type="text" id="last_name" name="lastname" value='<?php echo $_SESSION['last_name']; ?>' hidden/>

   <input type="text" id="batch_time" name="batchtime" hidden>
   <input type="text" id="batch_fee" name="batchfee" hidden>
   <input type="text" id="transactionid" name="transactionid" hidden>
    <h2>Congratulations!</h2>
    <img src="buckey.png" alt="Bouquet of Flowers">
    <p id="congrats-message">You have achieved a great milestone.</p>
   <input type="submit" class="close-btn" ></input> 
</div>

  
 
<!-- <button onclick="showCongratsDialog('You have successfully Registered for Swimming!')">Show Congratulations</button> -->

<script>
    function showCongratsDialog(message) {
        document.getElementById('congrats-message').innerText = message;
        document.getElementById('dialog-overlay').style.display = 'block';
        document.getElementById('congrats-dialog').style.display = 'block';

        for (let i = 0; i < 20; i++) {
            let sparkle = document.createElement('div');
            sparkle.className = 'sparkle';
            sparkle.style.top = Math.random() * 100 + '%';
            sparkle.style.left = Math.random() * 100 + '%';
            sparkle.style.animationDuration = (Math.random() * 0.5 + 0.5) + 's';
            document.getElementById('congrats-dialog').appendChild(sparkle);
        }
    }

    function closeDialog() {
        document.getElementById('dialog-overlay').style.display = 'none';
        document.getElementById('congrats-dialog').style.display = 'none';
        let sparkles = document.querySelectorAll('.sparkle');
        sparkles.forEach(function(sparkle) {
            sparkle.remove();
        });
    }
</script>
<script>
 var bt =localStorage.getItem("Batch Time");
 var bfee =localStorage.getItem("Batch Fee");
 var tid =localStorage.getItem("Transaction ID");
 
  document.getElementById("batch_time").value =bt;
  document.getElementById("batch_fee").value=bfee;
  document.getElementById("transactionid").value =tid;
 
</script>
</body>
</html>
