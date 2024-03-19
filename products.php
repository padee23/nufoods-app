<?php

echo "<style>
input[type=button], input[type=submit], input[type=reset] {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(odd) {
  background-color: #D6EEEE;
}
</style>";


include("connection.php");
$connection=new CONNECTION();
$conn=$connection->connect();

$sql = "SELECT * FROM `products` WHERE 1";
$result = $conn->prepare($sql);
$result->execute();
$result->bindColumn(1,$productId);
$result->bindColumn(2,$productName);
$result->bindColumn(3,$productWeight);
$result->bindColumn(4,$productIngredients);
$result->bindColumn(5,$productPrice);
$number_of_rows = $result->rowCount(); 
if($number_of_rows>0)
{
echo "<form action='buyproducts.php' method='post'>";
echo "<table>
<caption>Products</caption>
  <tr>
  <th>Name</th>
  <th>Weight</th>
  <th>Ingredients</th>
  <th>Price</th>
  <th>Select</th>
  </tr>";
  while($result->fetchObject())
  {
    echo "<tr>";
    echo "<td>$productName</td>";
    echo "<td>$productWeight</td>";
    echo "<td>$productIngredients</td>";
    echo "<td>$productPrice</td>";
    echo "<td> <input type='checkbox' id='products[]' name='products[]' value=$productId </td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "<input type='submit' value='Buy'>";
  echo "</form>";

}
else
{
  echo "No Results Found";
}
?>