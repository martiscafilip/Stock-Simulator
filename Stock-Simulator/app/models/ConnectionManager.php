<?php

class ConnectionManager
{
    protected $dbconn;

    public function get_conn()
    {
        return $this->dbconn;
    }

    public function __construct()
    {
          try {
            $this->dbconn = pg_connect("host=ec2-34-250-16-127.eu-west-1.compute.amazonaws.com port=5432 dbname=d4a2efe7vogg9q user=gutnhywyqxdjwr password=b3286a88c40ee6e164c5e2142c55e6dca5ac5725bb022d5b6184962202ee13f5");
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}


