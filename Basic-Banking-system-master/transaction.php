<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transaction history</title>
    <link rel="stylesheet" href="bbstransaction.css" class="css">
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
<table>
    <tbody>
        <tr>
            <th>S.No.</th>
            <th>FullName</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Date of Transaction</th>
        </tr>
  
<?php

include 'connection.php';

$sql="select * from `transferdata`";
$result=mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result)){
    // echo var_dump($row);
    $sno=$row['S.no'];
    $fname=$row['Fname'];
    $email=$row['Email'];
    $Balance=$row['Balance'];
    $date=$row['Date of transaction'];

    echo "<tr><td>$sno</td><td>$fname</td><td>$email</td><td>$Balance</td><td>$date</td></tr>";
    // echo "<br>";
}
?>
           
    </tbody>
</table>
<footer>&copy 2022 Mady By Neetika Shrivastava</footer>
</body>
</html>