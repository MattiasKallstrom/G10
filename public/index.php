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
	<body>




		
		<!-- Header Start -->
		












<!-- Section content starts here -->
<div class="container col-xl-12">
	

<div class="card-deck ">
<div class="col mb-3 justify-content-center d-flex justify-content-center">
	
		<?php foreach ($products as $product) { ?>
	<div class="card h-100">
		<img src="../images/almond1.jpg" class="card-img-top align-self-center" alt="...">

		<div class="card-body">
		<h3 class="card-title"><?=htmlentities($product['title'])?></h3>
					<p class="card-text"><?=htmlentities(substr($product['description'], 0,100))?>  ...</p>
			<p class="price"><?=htmlentities($product['price'])?> $</p>
			<form action="add-cart-item.php" method="POST">
			<input type="hidden" name="productId" value="<?= $product['id'] ?>">
			<input type="number" name="quantity" value="1" min="0">
			<input type="submit" class="btn btn-outline-success" name="addToCart" value="Add to cart">
			</form>
		</div>
	</div>
		<?php } ?>
</div>
</div>
</div>

<!-- <div class="col mb-3 d-flex justify-content-center">
	<div class="card h-100">
		<img src="../images/almond1.jpg" class="card-img-top align-self-center" alt="...">
		<div class="card-body">
			<h3 class="card-title">Almond</h3>
			<div class="rating_stars">
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star"></span>
				<span class="fa fa-star"></span>
			</div>
			<p class="price">$19.99</p>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae itaque, rerum quia fuga voluptatibus natus, aspernatur.
			</p>
			<a href="" class="btn btn-outline-success">Add to cart</a>
		</div>
	</div>
</div>
<div class="col mb-3 d-flex justify-content-center">
	<div class="card h-100">
		<img src="../images/oats.jpg" class="card-img-top align-self-center" alt="...">
		<div class="card-body">
			<h3 class="card-title">Oats</h3>
			<div class="rating_stars">
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star"></span>
				<span class="fa fa-star"></span>
			</div>
			<p class="price">$19.99</p>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae itaque, rerum quia fuga voluptatibus natus, aspernatur.
			</p>
			<a href="" class="btn btn-outline-success">Add to cart</a>
		</div>
	</div>
</div>
<div class="col mb-3 d-flex justify-content-center">
	<div class="card h-100">
		<img src="../images/peanut-butter.png" class="card-img-top align-self-center" alt="...">
		<div class="card-body">
			<h3 class="card-title">Peanut Butter</h3>
			<div class="rating_stars">
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star"></span>
				<span class="fa fa-star"></span>
			</div>
			<p class="price">$19.99</p>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae itaque, rerum quia fuga voluptatibus natus, aspernatur.
			</p>
			<a href="" class="btn btn-outline-success">Add to cart</a>
		</div>
	</div>
</div>
</div>
<div class="card-deck">
<div class="col mb-3 d-flex justify-content-center">
	<div class="card h-100">
		<img src="../images/dumbell.jpg" class="card-img-top align-self-center" alt="...">
		<div class="card-body">
			<h3 class="card-title">Dumbell</h3>
			<div class="rating_stars">
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star"></span>
				<span class="fa fa-star"></span>
			</div>
			<p class="price">$19.99</p>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae itaque, rerum quia fuga voluptatibus natus, aspernatur.
			</p>
			<a href="" class="btn btn-outline-success">Add to cart</a>
		</div>
	</div>
</div>
<div class="col mb-3 d-flex justify-content-center">
	<div class="card h-100">
		<img src="../images/dumbbell-bar.jpg" class="card-img-top align-self-center" alt="...">
		<div class="card-body">
			<h3 class="card-title">Dumbell Bar</h3>
			<div class="rating_stars">
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star"></span>
				<span class="fa fa-star"></span>
			</div>
			<p class="price">$19.99</p>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae itaque, rerum quia fuga voluptatibus natus, aspernatur.
			</p>
			<a href="" class="btn btn-outline-success">Add to cart</a>
		</div>
	</div>
</div>
<div class="col mb-3 d-flex justify-content-center">
	<div class="card h-100">
		<img src="../images/mat.jpg" class="card-img-top align-self-center" alt="...">
		<div class="card-body">
			<h3 class="card-title">Mat</h3>
			<div class="rating_stars">
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star"></span>
				<span class="fa fa-star"></span>
			</div>
			<p class="price">$19.99</p>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae itaque, rerum quia fuga voluptatibus natus, aspernatur.
			</p>
			<a href="" class="btn btn-outline-success">Add to cart</a>
		</div>
	</div>
</div>
<div class="col mb-3 d-flex justify-content-center">
	<div class="card h-100">
		<img src="../images/blender.jpg" class="card-img-top align-self-center" alt="...">
		<div class="card-body">
			<h3 class="card-title">Blender</h3>
			<div class="rating_stars">
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star"></span>
				<span class="fa fa-star"></span>
			</div>
			<p class="price">$19.99</p>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae itaque, rerum quia fuga voluptatibus natus, aspernatur.
			</p>
			<a href="" class="btn btn-outline-success">Add to cart</a>
		</div>
	</div>
</div>-->
<!-- </div> 
</div> -->
<!-- Section content ends here -->













<!-- footer starts here -->
<div class="container col-xl-12">
<footer class="site-footer">
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<h6>G-10</h6>
			<p class="text-justify">
				G-10.com <i>M & M & M </i>
			</p>
		</div>
		<div class="col-xs-6 col-md-3">
			<h6>Categories</h6>
			<ul class="footer-links">
				<li><a href="#!">More</a></li>
				<li>
					<a href="#!">More1</a>
				</li>
				<li>
					<a href="#!">More2</a>
				</li>
			</ul>
		</div>
		<div class="col-xs-6 col-md-3">
			<h6>Quick Links</h6>
			<ul class="footer-links">
				<li><a href="#!">About Us</a></li>
				<li><a href="#!">Contact Us</a></li>
				<li>
					<a href="#!">Work with us</a>
				</li>
				<li>
					<a href="signUp.php">Join us</a>
				</li>
			</ul>
		</div>
	</div>
	<hr />
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-sm-6 col-xs-12">
			<p class="copyright-text">
				Copyright &copy; 2020 All Rights Reserved by
				<a href="#">G-10.com</a>.
			</p>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<ul class="social-icons">
				<li>
					<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
				</li>
				<li>
					<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
				</li>
				<li>
					<a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a>
				</li>
				<li>
					<a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
				</li>
			</ul>
		</div>
	</div>
</div>
</footer>
</div>
<!-- footer ends here -->


</body>
</html>





