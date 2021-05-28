<?php
header('Content-Type: application/json');

require_once '../models/ConnectionManager.php';
require_once '../models/ModelAccount.php';
require_once('../../vendor/autoload.php');
require_once '../../vendor/finnhub/client/lib/Configuration.php';
require_once '../../vendor/guzzlehttp/guzzle/src/Client.php';


$aResult = array();

if (!isset($_POST['functionname'])) {
    $aResult['error'] = 'No function name!';
}


if (!isset($aResult['error'])) {

    switch ($_POST['functionname']) {
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

        default:
            $aResult['error'] = 'Not found function ' . $_POST['functionname'] . '!';
            break;
    }
}

echo json_encode($aResult);

?>