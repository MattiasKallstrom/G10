
<?php 
require('../src/config.php');
require('../src/dbconnect.php');
require('delete-product.php');
require('create.php');
require('update.php');
//require('upload.php');
error_reporting(-1);


if(!isset($_SESSION['user'])){
    require_once("../layout/header.php");
}else{  
    require_once("../layout/header-signed-in.php");
}




$stmt = $dbconnect->prepare("SELECT * FROM products ORDER BY id DESC");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt->bindParam(':id', $id);
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
  <body>
  <div id="container-xl">
  <h2 class="row justify-content-center mt-5">
      All products
</h2>

      <table class ="row justify-content-center mt-5">
       <tr class="form-group">
          <th class="col">ID</th>
          <th class="col">Title</th>
          <th class="col">Description</th>
          <th class="col">Price</th>
          <th class="col">Image</th>
        </tr>
        <?php foreach($products as $product): ?>
        
            <td class="col"><?php echo htmlspecialchars($product['id']); ?></td>
            <td class="col"><?php echo htmlspecialchars($product['title']); ?></td>
            <td class="col-10"><?php echo htmlspecialchars($product['description']); ?></td>
            <td class="col"><?php echo htmlspecialchars($product['price']); ?></td>
            <td class="col"><?php echo htmlspecialchars($product['img_url']); ?></td>
            <td>
            <form action="admin.php?=update.php" method="GET" >
                <input type="hidden" name="id" value="<?=$product['id']?>">
                <input type="submit" name="edit" class="btn btn-info" value="Update">
              </form>
              <form action="admin.php?delete=<?php echo $product['id']?>" method="POST">
                <input type="hidden" name="id" value="<?=$product['id']?>">
                 <input type="submit"name="delete" class=" btn btn-danger" value="Delete"></a>     
            </td>
          </tr>
        <?php endforeach; ?>
      </table>


      



      <div id="container">
        <article class="border">
        <form action="admin.php" method="POST">   
        <div class="form-group-xl-12"> 
            <p>
               <h2 class="form-title d-flex justify-content-center mt-5" >Create a new product</h2><br>
                <div class="form-row justify-content-center">
                </div>

                <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>"placeholder="Hello World">
                </div><br>
                <div class="form-group">
                <label for="content">Description</label>
                <textarea type="text" name="description" class="form-control" value="<?php echo $description; ?>" rows="5" cols="40" placeholder="Content"></textarea>
                </div><br>
                <div class="form-group">
                <label for="author">Price</label>
                <input type="number" name="price" class="form-control" value="<?php echo $price; ?>" placeholder="Price">
                </div><br>
                
                <label for ="image"> Select an image to upload</label>
                <input type="file" name="img_url" class="form-control-file" id="fileToUpload">
                <br>
         
                <input type ="submit" name="submit" class="btn btn-success" value="Submit">
            
            </p>
        </form>
       
        
</body>
        <?php
require_once("../layout/footer.php")
?>           

            <hr>
        </article>
    </div>
    </div>
</body>