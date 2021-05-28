<?php


require_once 'ConnectionManager.php';





function getFeed(){
    $managerr = new ConnectionManager;
    $conn = $managerr->get_conn();

    $sql ="SELECT * FROM rss_info ORDER BY id DESC LIMIT 20";

    $query = pg_query($conn, $sql);
    return $query;
}





// CREATE TABLE rss_info
//  (
//  id SERIAL PRIMARY KEY,
//  title VARCHAR(200),
//  link VARCHAR(200),
//  description TEXT
//  );
 
// insert into rss_info(title,link,description) values ('top 20','link','1:da 1500, 2: nu 1400');
// insert into rss_info(title,link,description) values ('top 20','link','1:dada 1500, 2: nu 1400');
// insert into rss_info(title,link,description) values ('top 20','link','1:da 1500, 2: nunu 1400'); 
?>