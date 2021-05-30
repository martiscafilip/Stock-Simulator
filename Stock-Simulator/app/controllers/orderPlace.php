<?php
require_once '../models/User.php';
require_once '../models/Stocks.php';
require_once('../../vendor/autoload.php');
require_once '../../vendor/finnhub/client/lib/Configuration.php';
require_once '../../vendor/guzzlehttp/guzzle/src/Client.php';

if (isset($_GET["orderbutton"])) {
    session_start();
    $amount = $_GET["cash"];

    if ($amount > cashAvaible($_SESSION["Username"], $_SESSION["Password"], $_SESSION["Account"]) || $amount<1) {
        header('Location: /public/trade/trade');
    } else {
        $ticker = $_GET["orderbutton"];


        $priceTicker = getTickerFinn($ticker);

        $config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c244gciad3ifufi6gd3g');
        $client = new Finnhub\Api\DefaultApi(
            new GuzzleHttp\Client(),
            $config
        );
        $res = $client->stockCandles($priceTicker, '1', time() - 120, time());
        $price = $res['c'][0];

        $amount = $_GET["cash"];
        $units = $amount / $price;


        debug_to_console($_GET["cash"]);
        $email = getEmailUser($_SESSION["Username"], $_SESSION["Password"]);
        $accoutnr = $_SESSION["Account"];
        insertTransaction($email, $accoutnr, $units, $price, $amount, $ticker);
        header('Location: /public/trade/trade');
    }
}

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
