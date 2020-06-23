<?php
require('../src/dbconnect.php');

?>

<?php

if (isset($_POST['submit'])){
$title = '';
$description = '';
$price = '';
$img_url = '';


$stmt = $dbconnect->prepare("INSERT INTO products (title, description, price, img_url)
VALUES (:title, :description, :price, :img_url)");

$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':img_url', $img_url);

$errors = array('title'=>'', 'description'=>'', 'price'=>'', 'img_url'=>'');

if (isset($_POST['submit'])){

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 

    if (empty($_POST["title"])) {
      $errors['title'] = "A title is required";
    } else {
      $title = $_POST["title"];
    }
    
    if (empty($_POST["description"])) {
      $errors['description'] = "Some description is required";
    } else {
      $description = $_POST["description"];
    }
      
    if (empty($_POST["price"])) {
    $errors['price'] = "The post needs a price";
    } else {
      $price = $_POST["price"];
    }

  }

}
$stmt->execute();
}


?>
