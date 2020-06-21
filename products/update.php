<?php 


$stmt = $dbconnect->prepare("UPDATE products (title, description, price, img_url)
WHERE id = :id");

$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':img_url', $img_url);






    ?>