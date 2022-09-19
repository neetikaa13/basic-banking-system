<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transfer page</title>
    <link rel="stylesheet" href="bsstransfer.css" class="css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Satisfy&family=Viaoda+Libre&display=swap" rel="stylesheet">
</head>
<body>
<div class="con">
            <div class="logo">
                <img src="https://th.bing.com/th/id/OIP.jDYIMaFDD072X0cM-C4kKgHaHx?w=188&h=197&c=7&o=5&dpr=1.25&pid=1.7" alt="logo pic">
                <h1>TSF BANK</h1>
            </div>
            <div class="navbar">
                <ul>
                <li><a href="/BBS/index.php">HOME</a></li>
                    <li><a href="/BBS/transfer.php">TRANSFER MONEY</a></li>
                    <li><a href="/BBS/transaction.php">TRANSATION HISTORY</a></li>
                </ul>
            </div>
            
        </div>
      
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $amount = $_POST['acc'];
include 'connection.php';
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


else{
    $sql ="SELECT * FROM `transferdata` WHERE `Email`='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo $num;
    if($num==0){
        $sql = "INSERT INTO `transferdata` (`Fname`, `Email`, `Balance`, `Date of transaction`) VALUES ('$name', '$email', '$amount', current_timestamp())";
        

        $result = mysqli_query($conn, $sql);
        if($result){
        echo "<script>alert('your transaction is successfull')</script>";
        }
        else{
        echo "<script>alert('your transaction is not successfull')</script>";
    }
       
        // $sql="update `transferdata` set `Balance`='$Balance+$amount' where `Email`='$email'";
    }
    else{
        $bal=0;
        while($row=mysqli_fetch_assoc($result)){
          
            $Balance =$row['Balance'];
            $bal=$Balance+$amount;
            //  echo $bal;
            
        }
        $sql="UPDATE `transferdata` SET `Balance`='$bal' WHERE `transferdata`.`Email` = '$email'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('your transaction is updation')</script>";
        }
        else{
           echo "<script>alert('your transaction is not updated')</script>";
       }
  
}
}

}
?>
<div class="con1">
        <form action="/BBS/transfer.php" method="post" class="frm">
            <h2>Enter the details for transaction</h2>
            <input id="name" value="" name="name" placeholder="Enter your name" required>
            <input id="email" value="" name="email" placeholder="Enter your email">
            <input id="acc" value="" name="acc" placeholder="Enter amount to transfer">
            <button id="btn" >Send</button>
        </form>
    </div>
<footer>&copy 2022 Mady By Neetika Shrivastava</footer>
</body>
</html>