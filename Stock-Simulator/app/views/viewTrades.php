<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/viewTrades.css">
    <title>ViewTrades</title>
</head>
<body>

<header>

            <p class="slogan">
                HODL FOR YOUR LIFE
            </p>
            <img class="logo" src="/public/profil-pictures/logo.png" alt="logo image">

</header>
<?php

require_once '../app/models/ModelAccount.php';



if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        echo $_SESSION['Account'];
$r_trades=getUserTradesInfo($_SESSION['Account']);
echo "<table style='width:100%'>";
echo  "<tr>";
echo    "<th>Ticker</th>";
echo    "<th>Unites</th> ";
echo    "<th>Price</th>";
echo    "<th>Amount</th>";
echo  "</tr>";
while ($row = pg_fetch_row($r_trades)) {
echo "<tr>";
echo    "<td>" . $row[6] . "</td>";
echo    "<td>" . $row[3] . "</td>";
echo    "<td>" . $row[4] . "</td>";
echo    "<td>" . $row[5] . "</td>";
echo  "</tr>";
}
echo "</table>";


?>

</body>
</html>