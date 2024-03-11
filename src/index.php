<?php
// Dabūt datus no datu bāzes un izvadīt tos HTML
require "functions.php";
$config = require "config.php";
require "Database.php";

echo "Hi, IPa22 👋";

$db = new Database($config);

$query_string = "SELECT * FROM posts";

if (isset($_GET["id"]) && $_GET["id"] != "") {
    $query_string .= " WHERE id = :id";
    $posts = $db->execute($query_string, ["id" => $_GET["id"]]);
} else {
    $posts = $db->execute($query_string);
}
echo "<form>";
echo "<input type='number' name='id'>";
echo "<button>Filter by id</button>";
echo "</form>";

echo "<h1>Posts</h1>";

echo "<ut>";
foreach ($posts as $post) {
    echo "<p>" . $post["title"] . "</p>";
}
echo "</ul>";
