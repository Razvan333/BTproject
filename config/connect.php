<?php

class DbConn {

    protected function connect() {
        try {
            $uName = "root";
            $password = "";
            $dbConn = new PDO('mysql:host=localhost;dbname=btproject',$uName, $password);
            return $dbConn;
        }
        catch(PDOException $e) {
            print "Error: " . $e->getMessage() . "<br/>";
            die();   
        }
    }
   

}
