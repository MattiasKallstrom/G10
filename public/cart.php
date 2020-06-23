<?php  
// require('../src/config.php');
// require('../src/dbconnect.php');

// unset($_SESSION['cartItems']);
if (!isset($_SESSION['cartItems'])) {
	$_SESSION['cartItems'] = [];
}

error_reporting(-1);
		 // echo "<pre>";
		 // print_r($_SESSION['cartItems']);
		 // echo "</pre>";
$cartItemCount = count($_SESSION['cartItems']);
$cartTotalSum = 0;
foreach ($_SESSION['cartItems'] as $cartId => $cartItem) {
	$cartTotalSum += $cartItem['price'] * $cartItem['quantity'];
}

?>


<div class="dropdown">
						<button type="button" class="btn btn-success" data-toggle="dropdown">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i> <?= $cartItemCount ?> <span
						class="badge badge-pill badge-danger"><?= $cartTotalSum ?></span>
						</button>
						<div class="dropdown-menu">
							<div class="row total-header-section">
								<div class="col-lg-6 col-sm-6 col-6">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
									class="badge badge-pill badge-danger"><?= $cartItemCount ?></span>
								</div>
								<div class="col-lg-6 col-sm-6 col-6 total-section text-right">
									<p>Total: <span class="text-info"><?= $cartTotalSum ?></span></p>
								</div>
							</div>
							<?php foreach ($_SESSION['cartItems']as $cartId => $cartItem) {?>
								
							
							<div class="row cart-detail">
								<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
									<img src= <?=htmlentities($cartItem['img_url'])?> alt="">
								</div>
								<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
									<p><?= $cartItem['title'] ?></p>
									<span class="price text-info"> <?= $cartItem['price'] ?> $</span> <span class="count">
								quantity : <?= $cartItem['quantity'] ?></span>
							</div>
						</div>
						<?php } ?>
						<!-- <div class="row cart-detail">
							<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
								<img src="../images/almond1.jpg">
							</div>
							<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
								<p>Almond DSC-RX100M..</p>
								<span class="price text-info"> Kr500.40</span> <span class="count">
							Quantity:01</span>
						</div>
					</div>
					<div class="row cart-detail">
						<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
							<img src="../images/dumbell.jpg">
						</div>
						<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
							<p>Dumbell DSC-RX100M..</p>
							<span class="price text-info"> Kr545.78</span> <span class="count">
						Quantity:01</span>
					</div>
				</div> -->
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-12 text-center checkout">
						<a class="btn btn-primary btn-block" href="../public/check-out.php">Checkout</a>
					</div>
				</div>
			</div>
		</div>