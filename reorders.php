<?php
require_once 'vendor/autoload.php';
use Michelf\MarkdownExtra;

// connect to database
$conn = new SQLite3('database.db');

// display reorders
$query = "SELECT * FROM reorders";
$result = $conn->query($query);

if ($result->numColumns() > 0) {
  echo "<h1>Reorders</h1>";
  echo "<table>";
  echo "<tr><th>Product</th><th>Quantity</th><th>Reorder Date</th></tr>";
  while ($row = $result->fetchArray()) {
    echo "<tr>";
    echo "<td>" . $row["product_id"] . "</td>";
    echo "<td>" . $row["quantity"] . "</td>";
    echo "<td>" . $row["reorder_date"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No reorders found";
}

// close connection
$conn->close();
?>
