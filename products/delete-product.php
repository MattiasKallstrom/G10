<?php 
$success = array('edit'=>'', 'delete'=>'');
if (isset($_GET['delete'])) {
$id = $_GET['delete'];
$stmt = $dbconnect->prepare("DELETE FROM products WHERE id=$id");
$stmt->execute();
}