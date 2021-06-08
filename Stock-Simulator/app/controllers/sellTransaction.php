<?php
require_once '../models/ConnectionManager.php';
require_once '../models/ModelAccount.php';



$managerr = new ConnectionManager;
$conn = $managerr->get_conn();

$id = $_GET['value'];

$q3 = "SELECT accountnr FROM transactions WHERE id='$id'";
$accountnr = pg_query($conn, $q3);
$balance = pg_fetch_row($accountnr);
$accountnr = $balance[0];

$q = "SELECT units,price,ticker FROM transactions WHERE accountnr=$accountnr";
$row = pg_query($conn, $q);
$a = pg_fetch_row($row);
$row = $a;

$currentprice = getCurrentPrice(getTickerFinn($row[2]));

$profit = $currentprice * $row[0] - $row[1] * $row[0];

$q4 = "SELECT balance from account WHERE accountnr=$accountnr";
$row2 = pg_query($conn, $q4);
$b = pg_fetch_row($row2);
$lastbalance = $b[0];

$newbalance = intval($lastbalance + $profit);
echo $newbalance;


$q2 = "UPDATE account SET balance = '$newbalance' WHERE accountnr=$accountnr";
$row = pg_query($conn, $q2);

$query = "DELETE FROM transactions WHERE id='$id'";
$results = pg_query($conn, $query);

header('Location: /public/trade/trade');