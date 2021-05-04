
    <?php
    require_once '../models/ConnectionManager.php';
    require_once '../models/User.php';
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
        } else {  
            session_start();
            $_SESSION["Username"] = $user;
            $_SESSION["Password"] = hash("md5", $password);
            header('Location: ../views/trade.php');
        }
    }
