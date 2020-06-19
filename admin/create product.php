<?php

require('../src/config.php');
require(SRC_PATH . 'dbconnect.php'); 
$title       ='';
$description ='';
$price   ='';
$error  = '';
$msg       = '';
if (isset($_POST['register'])) {
$title       = trim($_POST['title']);
$description = trim($_POST['description']);
$price   = (float)($_POST['price']);

{
try {
$query = "
INSERT INTO products (title, description, price)
VALUES (:title, :description, :price);
";
$stmt = $dbconnect->prepare($query);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$result = $stmt->execute(); // returns true/false
} catch(\PDOException $e) {
throw new \PDOException($e->getMessage(), (int) $e->getCode());
}
if ($result) {
$msg = '<div class="success_msg">New Product Created</div>';
} else {
$msg = '<div class="error_msg">"Invalid Product Title  Or Price, Try Again"!</div>';
}
}
}
?>
<?php require('include/navbar.php')?>
	<body>
		
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="#">
					<div class="modal-header">
						<a class="navbar-brand" href="manage product.php"  > To &nbsp;Manage<b>&nbsp;Product</b></a>
						<legend> CREATE NEW PRODUCT
							
							<?=$msg?>
						</legend>
						<div class="form-group">
							<input type="text" class="form-control" name="title" placeholder="title" name="title"  class="text-input"value="<?=htmlentities($title)?>">
						</div>
						<div class="form-group">
							<input type="description" class="form-control"  placeholder="description"name="description"  class="text-input" value="<?=htmlentities($description)?>">
						</div>
						<div class="form-group">
							<input type="price" class="form-control" name="price" placeholder="price" >
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success" name="register" value="Skapa">Create</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>