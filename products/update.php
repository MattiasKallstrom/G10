<?php 
require('../src/dbconnect.php');


if(!isset($_SESSION['user'])){
    require_once("../layout/header.php");
}else{  
    require_once("../layout/header-signed-in.php");
}

$title = '';
$description = '';
$price = '';
$img_url = '';

if (isset($_POST['update'])) {
    $title       = trim($_POST['title']);
    $description = trim($_POST['description']);
    $price   = trim($_POST['price']);

    $stmt = $dbconnect->prepare("UPDATE products SET title = :title, description = :description, price = :price WHERE id = :id");
      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':description', $description);
      $stmt->bindParam(':price', $price);
      $stmt->bindParam(':id', $_GET['id']);
      $stmt->execute();
} 


$stmt = $dbconnect->prepare("SELECT * FROM products WHERE id = :id");
$stmt->bindvalue(':id', $_GET['id']);
$stmt->execute();
$product = $stmt->fetch();


$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':img_url', $img_url);




    ?>
 <!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<meta charset="UTF-8">
		<title><?php  ?></title>
	</head>
<body class="admin-page">
 
 
<div class="container">
<div class="row justify-content-center mt-5">

      <div class="container col-xl-12">
        
        <form action="" method="POST">               
               <h2 class="form-title d-flex justify-content-center mt-5" >Edit an existing product</h2><br>
                <div class="form-row justify-content-center">
                </div>
                <br>
               
                <label for="title">Title</label>
                <br>
                <input type="text" name="title" class="form-control" 
                value="<?=htmlentities($product['title'])?>"placeholder="Hello World">
                <br>
                
                <label for="description">Description</label>
                <br>
                <input type="text" name="description" class="form-control" 
                value="<?=htmlentities($product['description'])?>" placeholder="Description"></input>
                <br>
                
                <label for="price">Price</label>
                <br>
                <input type="number" name="price" class="form-control" 
                value="<?=htmlentities($product['price'])?>" placeholder="Price">
                <br>
                
                <label for ="image"> Select an image to upload</label>
                <br>
                <input type="file" name="img_url" class="form-control-file" id="fileToUpload">
                <br>
               
                <input type ="submit" name="update" class="btn btn-success" value="Update">
          


                
          </div>
        </div>
       </form>
      </div>
    </div>
   </div>
   </div>
</div>
  </body>


  <?php
require_once("../layout/footer.php");
?>  