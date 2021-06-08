
    <?php
    require_once '../models/ConnectionManager.php';
    require_once '../models/User.php';
    require_once '../../vendor/autoload.php';
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
            session_start();
            $_SESSION["Incorrect"] = "true";
            header('Location: ../../public/home/login');

            // echo "INCORECT USERNAME OR PASSWORD!";
            // $config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c244gciad3ifufi6gd3g');
            // $client = new Finnhub\Api\DefaultApi(
            //     new GuzzleHttp\Client(),
            //     $config
            // );
            //  $res=$client->stockCandles('PINS', '1', time() - 120, time());
            // // $res= $client->cryptoSymbols('BINANCE');
            // //  print_r($res);

            //  echo $res;
            // echo "---------->";
            // echo $res['c'][0];
            // echo "<-----------";
            
            // $aux=(array)json_decode( $client->forexRates('USD'),true);
            // $aux2=(array)json_decode( $client->forexRates('EUR'),true);           
                
            //     echo strval($aux['quote']['EUR']);
            //     echo "----><----";
            //     echo strval($aux2['quote']['USD']);

        } else {
            session_start();
            $_SESSION["Incorrect"] = "false";
            $_SESSION["Username"] = $user;
            $_SESSION["Password"] = hash("md5", $password);
            $_SESSION["Account"] = getAccount($user);
            $_SESSION["Currency"]="USD";
            header('Location: ../../public/trade/trade');
        }
    }
