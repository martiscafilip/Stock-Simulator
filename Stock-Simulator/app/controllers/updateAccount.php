<?php
header('Content-Type: application/json');

require_once '../models/ConnectionManager.php';
require_once '../models/ModelAccount.php';
require_once('../../vendor/autoload.php');
require_once '../../vendor/finnhub/client/lib/Configuration.php';
require_once '../../vendor/guzzlehttp/guzzle/src/Client.php';


$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

$aResult = [
    'error' => 'Nothing happened',
    'result' => null,
    'r_balance' => null,
    'r_profit' => null,
    'r_rank' => null,
    'r_trades' => null,
    'r_session_currency' => null
  ];
  

if ($contentType === "application/json") {
  //Receive the RAW post data.
  $content = trim(file_get_contents("php://input"));

  $decoded = json_decode($content, true);

  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    switch ($decoded['functionname']) {

        case 'UpdateCurrentAvatar':

            $aResult['result'] = UpdateCurrentAvatar(($decoded['arg1']), ($decoded['arg2']));
            break;

        case 'putFeedback':
            $aResult['result'] = putFeedback(($decoded['arg1']), ($decoded['arg2']));

            $items=getEmailUsername($decoded['arg2']);
            $message=$items[0] . " " . $items[1] . "->" . $decoded['arg1'];
            telegram($message);
            break;

         case 'getInfosAccount' :
            $aResult["r_balance"]=getPortofValue($decoded['arg1']);
            $aResult["r_profit"]=getProfit($decoded['arg1']);
            $aResult["r_rank"]=getGlobalRank($decoded['arg1']);
            $aResult["r_trades"]=getTradesUser($decoded['arg1']);
            $aResult["r_session_currency"]=$_SESSION["Currency"];

            break;

        default:
            $aResult['error'] = 'Not found function !';
            break;
    }    

  

}else {
      $response['error'] =  'Content-Type is not set as "application/json"';

}
echo json_encode($aResult);
