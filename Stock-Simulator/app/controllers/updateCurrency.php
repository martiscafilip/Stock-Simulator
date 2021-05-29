<?php
header('Content-Type: application/json');

require_once '../models/ConnectionManager.php';
require_once '../models/ModelAccount.php';
require_once('../../vendor/autoload.php');
require_once '../../vendor/finnhub/client/lib/Configuration.php';
require_once '../../vendor/guzzlehttp/guzzle/src/Client.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

$aResult = [
    'error' => 'Nothing happened',
    'result' => null,
  ];
  

if ($contentType === "application/json") {
  //Receive the RAW post data.
  $content = trim(file_get_contents("php://input"));

  $decoded = json_decode($content, true);

  
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    switch ($decoded['functionname']) {
        case 'changeCurrencyToEUR':

            $config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c244gciad3ifufi6gd3g');
            $client = new Finnhub\Api\DefaultApi(
                new GuzzleHttp\Client(),
                $config
            );
            $aux = (array)json_decode($client->forexRates('USD'), true);
            $aResult['result'] = $aux['quote']['EUR'];

            break;

        case 'changeCurrencyToUSD':

            $config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c244gciad3ifufi6gd3g');
            $client = new Finnhub\Api\DefaultApi(
                new GuzzleHttp\Client(),
                $config
            );
            $aux = (array)json_decode($client->forexRates('EUR'), true);
            $aResult['result'] = $aux['quote']['USD'];

            break;
        case 'EUR':
            
            $_SESSION["Currency"]="EUR";
            $aResult['result'] ='euro';
            break;

        case 'USD': 
            $_SESSION["Currency"]="USD";
            $aResult['result'] ='dolar';
            break;

        default:
            $aResult['error'] = 'Not found function ' . $decoded['functionname'] . '!';
            break;
    }
}

echo json_encode($aResult);

?>