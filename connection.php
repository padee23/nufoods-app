<?php
Class CONNECTION
{
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "nu_food";

public function connect()
{
  try {
// Create connection
$conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbname,$this->username,$this->password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $conn;
}


catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
   
}
}

}
?>