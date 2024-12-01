<?php
require 'config.php';

$id = $_GET['id'];
$conn->query("DELETE FROM items WHERE id = $id");

header('Location: index.php');
?>
