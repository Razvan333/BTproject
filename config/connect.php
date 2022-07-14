<?php

$sName = "localhost";
$uName = "root";
$password = "";
$dbName = "btproject";
$charset = "utf8mb4";

try {
    $dsn = 'mysql:host=' . $sName . ';dbname=' . $dbName;
    $conn = new PDO($dsn, $uName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed : " . $e->getMessage();
}
?>


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


