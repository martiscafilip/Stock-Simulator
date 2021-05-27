<?php
require_once 'ConnectionManager.php';
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
