<?php
require_once 'ConnectionManager.php';
require_once 'ModelAccount.php';
class User
{
    public $name;
}
function getUser($username, $password)
{

    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();


    $query = "SELECT * FROM users WHERE username= $1 AND password = $2";
    pg_prepare($conn, "prepare1", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "prepare1", array($username, $password))
        or die("Cannot execute statement\n");

    $row = pg_fetch_row($results);
    if (!empty($row)) {
        return $row[1];
    } else

        return null;
}

function getEmailUser($username, $password)
{

    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();


    $query = "SELECT * FROM users WHERE username= $1 AND password = $2";
    pg_prepare($conn, "prepare11", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "prepare11", array($username, $password))
        or die("Cannot execute statement\n");

    $row = pg_fetch_row($results);
    if (!empty($row)) {
        return $row[2];
    } else

        return null;
}

function getAccount($username)
{
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT accountnr
                    FROM account
                    WHERE name = '$username'";

    $result = pg_query($conn, $query);
    if (!$result) {
        echo "An error occured!\n";
        return null;
    }
    $fetch = pg_fetch_row($result);
    if (!empty($fetch)) {
        return $fetch[0];
    } else
        return null;
}

function modifySessionAccount($name)
{

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION["Account"] = getAccount($name);
}

function insertTransaction($email, $accountnr, $units, $price, $amount, $ticker)
{
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();


    $query = "INSERT INTO transactions VALUES($1, $2, $3, $4, $5, $6)";
    pg_prepare($conn, "prepare10", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "prepare10", array($email, $accountnr, $units, $price, $amount, $ticker))
        or die("Cannot execute statement\n");
}

function cashAvaible($username, $password,  $accountnr)
{
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();
    $email = getEmailUser($username, $password);

    $query = "SELECT balance
                    FROM account
                    WHERE email = '$email' AND accountnr='$accountnr'";

    $result = pg_query($conn, $query);
    if (!$result) {
        echo "An error occured!\n";
        return null;
    }
    $balance = pg_fetch_row($result);
    $query = "SELECT amount FROM transactions WHERE accountnr='$accountnr' AND email = '$email'";

    $results = pg_query($conn, $query);
    if (!$result) {
        echo "An error occured!\n";
        return null;
    }

    $sum = 0;

    while ($row = pg_fetch_row($results)) {
        $sum = $sum + $row[0];
    }
 return $balance[0]-$sum;
}

function performance($username, $password,  $accountnr)
{
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();
    $email = getEmailUser($username, $password);

    $query = "SELECT balance
                    FROM account
                    WHERE email = '$email' AND accountnr='$accountnr'";

    $result = pg_query($conn, $query);
    if (!$result) {
        echo "An error occured!\n";
        return null;
    }
    $balance = pg_fetch_row($result);

    $query = "SELECT units,price,ticker FROM transactions WHERE accountnr='$accountnr'";

    $results = pg_query($conn, $query);
    if (!$result) {
        echo "An error occured!\n";
        return null;
    }

    $profit = 0;

    while ($row = pg_fetch_row($results)) {
        $currentprice = getCurrentPrice(getTickerFinn($row[2]));
        $profit += $currentprice * $row['0'] - $row['1'] * $row['0'];
    }
     return (($profit/$balance[0])*100);
}


