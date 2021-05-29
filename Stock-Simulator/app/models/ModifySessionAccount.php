<?php

require_once '../models/User.php';


$name = $_GET['name'];
echo $name;
modifySessionAccount($name);

header('Location: ../../public/trade/trade');
?>