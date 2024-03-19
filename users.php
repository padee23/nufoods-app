<?php
$email=$_POST['email'];
$password=$_POST['psw'];

include("connection.php");
$connection=new CONNECTION();
$conn=$connection->connect();

$sql = "SELECT * FROM `users` WHERE `email_address`=? AND `password`=?";
$result = $conn->prepare($sql);
$result->bindParam(1,$email, PDO::PARAM_STR);
$result->bindParam(2,$password, PDO::PARAM_STR);
$result->execute();

$result->bindColumn(1,$userId);
$result->bindColumn(2,$firstName);
$number_of_rows = $result->rowCount(); 

if($number_of_rows>0)
{
  while($result->fetchObject())
  {
    echo "Hi $firstName. You have been successfuly signed in. Welcome to NU Foods. Stay and enjoy our delicacies to the best.";
    
  }


}
else
{
  echo "No Results Found";
}



?>