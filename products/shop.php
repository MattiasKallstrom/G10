<?php 
require('../src/config.php');
require('../src/dbconnect.php');

error_reporting(-1);


if(!isset($_SESSION['user'])){
    require_once("../layout/header.php");
}else{  
    require_once("../layout/header-signed-in.php");
}
?>

<?php
if (isset($_GET['item'])) {
    $stmt = $dbconnect->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$_GET['item']]);
    $products = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':img_url', $img_url);
}

?>
<body class="shop-page">
<div class="container col-xl-12">
<div class="card-deck">
<div class="col mb-3 justify-content-center d-flex justify-content-center">

   
   <div class="product content-wrapper">
    <div class="card h-100">
       <img src=<?php echo $products['img_url']?> class="card-img-top align-self-center" alt="...">
    <div class="card-body">
    <h3 class="card-title"><?=htmlentities($products['title'])?></h3>
    <p class="card-text"><?=htmlentities(substr($products['description'], 0,100))?></p>
    <p class="price">$<?=htmlentities($products['price'])?> </p>
        <form action="../public/add-cart-item.php" method="POST">
			<input type="hidden" name="productId" value="<?= $products['id'] ?>">
			<input type="number" name="quantity" value="1" min="0">
			<input type="submit" class="btn btn-outline-success" name="addToCart" value="Add to cart">
			</form>
</div>
</div>
</div>
    </div>
</div>
</body>
<?php
require_once("../layout/footer.php")
?>