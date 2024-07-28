// products.php
<?php
require_once 'vendor/autoload.php';
use Michelf\MarkdownExtra;

// connect to database
$conn = new SQLite3('database.db');

// display products
$query = "SELECT * FROM products";
$result = $conn->query($query);

if ($result->numColumns() > 0) {
  echo "<h1>Products</h1>";
  echo "<table>";
  echo "<tr><th>Name</th><th>Category</th><th>Quantity</th><th>Price</th></tr>";
  while ($row = $result->fetchArray()) {
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["category_id"] . "</td>";
    echo "<td>" . $row["quantity"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No products found";
}

// close connection
$conn->close();
?>
