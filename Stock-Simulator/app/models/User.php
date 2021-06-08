<?php
require_once 'ConnectionManager.php';
require_once 'Stocks.php';
define('__ROOTT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOTT__.'/vendor/autoload.php');
require_once(__ROOTT__.'/vendor/finnhub/client/lib/Configuration.php');
require_once(__ROOTT__.'/vendor/guzzlehttp/guzzle/src/Client.php');


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


    $query = "SELECT * FROM users WHERE username= '$username' AND password = '$password'";
    $results = pg_query($conn, $query);
    if (!$results) {
        echo "An error occured!\n";
        return null;
    }
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


    $query = "INSERT INTO transactions VALUES( nextval('idinc'),$1, $2, $3, $4, $5, $6)";
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

function getCurrentPrice5($ticker)
{
    $config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c244gciad3ifufi6gd3g');
    $client = new Finnhub\Api\DefaultApi(
        new GuzzleHttp\Client(),
        $config
    );
     $res=$client->stockCandles($ticker, '1', time() - 120, time());
    return $res['c'][0];
}

function performance($accountnr)
{

    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT balance
                    FROM account
                    WHERE  accountnr='$accountnr'";

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
        // echo "<script>console.log('Debug Objects: " . "test" . "' );</script>";
        $test =getTickerFinn($row[2]);
        $currentprice = getCurrentPrice5($test);
        $profit += $currentprice * $row['0'] - $row['1'] * $row['0'];
    }
    // echo "<script>console.log('Debug Objects: " . (($profit/$balance[0])*100) . "' );</script>";
    if($balance[0]==0)
    {
        return "0%";
    }
      return strval(intval(($profit/$balance[0])*100)) . "%";
    
}


function sellTrades($ticker,$username, $password,  $accountnr)
{
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();
    $email = getEmailUser($username, $password);

    $query = "SELECT id, price, amount FROM transactions where email='$email' AND accountnr='$accountnr' AND ticker='$ticker'" ;

    $result = pg_query($conn, $query);
    if (!$result) {
        echo "An error occured!\n";
        return null;
    }
    return $result;
}



