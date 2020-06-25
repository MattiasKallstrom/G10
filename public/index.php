<?php 
require('../src/config.php');
require('../src/dbconnect.php');

error_reporting(-1);
$pageTitle = 'Home';

if(!isset($_SESSION['user'])){
    require_once("../layout/header.php");
}else{  
    require_once("../layout/header-signed-in.php");
}


try {
		$query = 'SELECT * FROM products';
		$stmt = $dbconnect->query($query);
		$products = $stmt->fetchAll();
} catch (\PDOException $e) {
	throw new \PDOException ($e->getMessage(), (int) $e->getCode());
	
	
}
	
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

		<!-- Header Start -->
	
<!-- Section content starts here -->
<body class="index-page">
<div class="container col-xl-12">
	

<div class="card-deck ">
<div class="col mb-3 justify-content-center d-flex justify-content-center">
	
		<?php foreach ($products as $product) { ?>
	<div class="card h-100">
		<img src=<?=htmlentities($product['img_url'])?> class="card-img-top align-self-center" alt="...">
		

		<div class="card-body">
		
		<h3 class="card-title"><?=htmlentities($product['title'])?></h3>
					<p class="card-text"><?=htmlentities(substr($product['description'], 0,100))?></p>
			<p class="price">$<?=htmlentities($product['price'])?> </p>
			<form action="add-cart-item.php" method="POST">
			<input type="hidden" name="productId" value="<?= $product['id'] ?>">
	
			<a href="../products/shop.php?item=<?php echo $product['id'] ?>" class="btn btn-outline-success" name="item">View item</a>
			</form>
		</div>
	</div>
		<?php } ?>
</div>
</div>
</div>


<?php
if (isset($_GET['id'])) {
    $stmt = $dbconnect->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $products = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':img_url', $img_url);
}
require_once('../layout/footer.php')

?>







