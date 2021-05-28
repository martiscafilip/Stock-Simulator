<?php
require_once 'ConnectionManager.php';
require_once  'Stocks.php';
require_once '../../Stock-Simulator/vendor/autoload.php';
require_once '../../Stock-Simulator/vendor/finnhub/client/lib/Configuration.php';
require_once '../../Stock-Simulator/vendor/guzzlehttp/guzzle/src/Client.php';


class Avatar
{
    public $name;
}

function getGlobalRank($accountnr)
{

    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT count(*) FROM account t 
             WHERE t.balance >= (SELECT t2.balance FROM  
                                (SELECT balance,accountnr FROM account ORDER BY balance DESC) t2
                                                                          WHERE t2.accountnr=$1)";


    pg_prepare($conn, "rank", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "rank", array($accountnr))
        or die("Cannot execute statement\n");

    $row = pg_fetch_row($results);
    if (!empty($row)) {
        return $row[0];
    } else

        return null;
}

function telegram($msg)
{
    $telegrambot = '1832894465:AAH6RlzP2Gee4RhjSfq7yispdsbXcPgMLZs';
    $telegramchatid =-1001497334677;

    $url = 'https://api.telegram.org/bot' . $telegrambot . '/sendMessage';
    $data = array('chat_id' => $telegramchatid, 'text' => $msg);
    $options = array('http' => array('method' => 'POST', 'header' => "Content-Type:application/x-www-form-urlencoded\r\n", 'content' => http_build_query($data),),);
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}

function getCurrentAvatar($accountnr)
{
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT a.avatar FROM avatars a join account c on a.id=c.avatar_id where c.accountnr=$1";

    pg_prepare($conn, "prepare", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "prepare", array($accountnr))
        or die("Cannot execute statement\n");

    $row = pg_fetch_row($results);
    if (!empty($row)) {
        return $row[0];
    } else

        return null;
}

function getProfit($accountnr)
{
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT units,price,ticker FROM transactions WHERE accountnr=$1";

    pg_prepare($conn, "profit", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "profit", array($accountnr))
        or die("Cannot execute statement\n");

    $profit = 0;

    while ($row = pg_fetch_row($results)) {
        $currentprice = getCurrentPrice(getTickerFinn($row[2]));
        $profit += $currentprice * $row['0'] - $row['1'] * $row['0'];
    }
    return $profit;
}

function getCurrentPrice($ticker)
{
    $config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c244gciad3ifufi6gd3g');
    $client = new Finnhub\Api\DefaultApi(
        new GuzzleHttp\Client(),
        $config
    );
    $res = $client->stockCandles($ticker, '1', time() - 120, time());
    return $res['c'][0];
}


function UpdateCurrentAvatar($avatar_id, $accountnr)
{

    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();


    $query = "update account SET avatar_id = $1 where accountnr=$2";
    pg_prepare($conn, "prepare", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "prepare", array($avatar_id, $accountnr))
        or die("Cannot execute statement\n");


    return "aaaaa";
}

function getTradesUser($accountnr)
{

    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT count(*) FROM transactions where accountnr=$1";

    pg_prepare($conn, "trades", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "trades", array($accountnr))
        or die("Cannot execute statement\n");

    $row = pg_fetch_row($results);
    if (!empty($row)) {
        return $row[0];
    } else

        return null;
}

function getAllAvatars()
{

    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT id,avatar FROM avatars";


    $results = pg_query($conn, $query);

    $contor = [];
    while ($row = pg_fetch_row($results)) {
        array_push($contor, $row);
    }

    return $contor ?? null;
}

function getUsername($accountnr)
{
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT a.name FROM account a WHERE a.accountnr=$1";

    pg_prepare($conn, "stm", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "stm", array($accountnr))
        or die("Cannot execute statement\n");

    $row = pg_fetch_row($results);
    if (!empty($row)) {
        return $row[0];
    } else

        return null;
}

function getPortofValue($accountnr)
{

    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT balance FROM account where accountnr=$1";


    pg_prepare($conn, "balance", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "balance", array($accountnr))
        or die("Cannot execute statement\n");

    $row = pg_fetch_row($results);
    if (!empty($row)) {
        return $row[0];
    } else

        return null;
}

function getEmailUsername($accountnr)
{

    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $query = "SELECT name,email FROM account where accountnr=$1";


    pg_prepare($conn, "telegram", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "telegram", array($accountnr))
        or die("Cannot execute statement\n");

    $row = pg_fetch_row($results);
    if (!empty($row)) {
        return $row;
    } else

        return null;
}

function putFeedback($message, $accountnr)
{

    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();


    $query = "insert into usersfeedback (msg,msgdate,accountnr) values ($1,current_timestamp,$2)";
    pg_prepare($conn, "feedback", $query)
        or die("Cannot prepare statement\n");

    $results = pg_execute($conn, "feedback", array($message, $accountnr))
        or die("Cannot execute statement\n");

    return "done!";
}
