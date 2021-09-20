<?php
$servername = "mysql";
$username = "";
$password = "";
$dbname = "";

try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        }
    catch(PDOException $e)
        {
        var_dump($e);
        }

echo "<br>";

phpinfo();

?>
