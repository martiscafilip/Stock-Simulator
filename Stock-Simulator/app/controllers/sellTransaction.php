<?php
require_once '../models/ConnectionManager.php';

$managerr = new ConnectionManager;
$conn = $managerr->get_conn();

$id = $_GET['value'];
$query = "DELETE FROM transactions WHERE id='$id'";
$results = pg_query($conn, $query);

header('Location: /public/trade/trade');