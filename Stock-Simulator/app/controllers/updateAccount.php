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

if (!isset($_POST['arg1']) && !isset($_POST['arg2'])) {
    $aResult['error'] = 'No function arguments!';
}

if (!isset($aResult['error'])) {

    switch ($_POST['functionname']) {

        case 'UpdateCurrentAvatar':

            $aResult['result'] = UpdateCurrentAvatar(($_POST['arg1']), ($_POST['arg2']));
            break;

        case 'putFeedback':
            $aResult['result'] = putFeedback(($_POST['arg1']), ($_POST['arg2']));

            $items=getEmailUsername($_POST['arg2']);
            $message=$items[0] . " " . $items[1] . "->" . $_POST['arg1'];
            telegram($message);
            break;

        default:
            $aResult['error'] = 'Not found function ' . $_POST['functionname'] . '!';
            break;
    }
}

echo json_encode($aResult);
