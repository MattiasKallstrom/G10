<?php 
if (isset($_POST['delete'])) {
$id = $_GET['delete'];
$stmt = $dbconnect->prepare("DELETE FROM products WHERE id=$id");
$stmt->execute();
}