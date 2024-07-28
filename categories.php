// categories.php
<?php
require_once 'vendor/autoload.php';
use Michelf\MarkdownExtra;

// connect to database
$conn = new SQLite3('database.db');

// display categories
$query = "SELECT * FROM categories";
$result = $conn->query($query);

if ($result->numColumns() > 0) {
  echo "<h1>Categories</h1>";
  echo "<ul>";
  while ($row = $result->fetchArray()) {
    echo "<li>" . $row["name"] . "</li>";
  }
  echo "</ul>";
} else {
  echo "No categories found";
}

// close connection
$conn->close();
?>
