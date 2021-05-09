
    <?php
    require_once '../models/ConnectionManager.php';
    require_once '../models/User.php';
    require_once ('../../vendor/autoload.php');
    require_once '../../vendor/finnhub/client/lib/Configuration.php';
    require_once '../../vendor/guzzlehttp/guzzle/src/Client.php';

    $manager = new ConnectionManager;
    $conn = $manager->get_conn();

    // ini_set('session.cookie_lifetime', 3600);
    // ini_set('session.gc_maxlifetime', 3600);


    $username = $_POST["username"];
    $password = $_POST["password"];


    if (!empty($_POST["username"])) {
        //  pg_query($conn, "INSERT INTO test VALUES('mergeeeeeeeeeeeeeeee')");
        $user = getUser($username, hash("md5", $password));
        if (empty($user)) {

            echo "INCORECT USERNAME OR PASSWORD!";




            $config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c244gciad3ifufi6gd3g');
            $client = new Finnhub\Api\DefaultApi(
                new GuzzleHttp\Client(),
                $config
            );
            echo $client->stockCandles('TSLA', '1', time() - 120, time());
        } else {
            session_start();
            $_SESSION["Username"] = $user;
            $_SESSION["Password"] = hash("md5", $password);
            $_SESSION["Account"] = getAccount($user);
            header('Location: ../views/trade.php');
        }
    }
