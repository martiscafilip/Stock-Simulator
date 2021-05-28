<?php    
require_once '../app/models/rssModel.php';
require_once '../app/models/updateRssInfo.php';

$feed = getFeed();
    
header( "Content-type: text/xml");

echo "<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
<channel>
<title>Hodler leaderboard</title>
<link>https://stock-simulator-hodler.herokuapp.com/public/leaderBoard/leaderBoard</link>
<description>The most succesfull people from this site</description>
<language>en-us</language>";




while($row = pg_fetch_array($feed)){
    $title=$row["title"];
    $link=$row["link"];
    $description=$row["description"];

    echo "<item>
    <title>$title</title>
    <link>$link</link>
    <description>$description</description>
    </item>";
}
echo "</channel></rss>";




?>