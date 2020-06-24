<?php
require('../../src/config.php');
require(SRC_PATH . 'dbconnect.php');

$title  = '';
$description    = '';
$price      = '';
$error     = '';
$msg       = '';
if (isset($_POST['register'])) {
$title       = trim($_POST['title']);
$description = trim($_POST['description']);
$price   = (float)($_POST['price']);

if (empty($title)) {
$error .= "<li>title is required</li>";
}
if (empty($description)) {
$error .= "<li>description is required</li>";
}
if (empty($price)) {
$error .= "<li>price is required</li>";
}

if ($error) {
$msg = "<ul class='error_msg'>{$error}</ul>";
}

if ($error) {
$msg = "<ul class='error_msg'>{$error}</ul>";
}
if (empty($error)) {
try {
$query = "
UPDATE products
SET title = :title, description = :description, price = :price
WHERE id = :id
";
$stmt = $dbconnect->prepare($query);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':id', $_GET['id']);
$result = $stmt->execute(); // returns true/false
} catch(\PDOException $e) {
throw new \PDOException($e->getMessage(), (int) $e->getCode());
}
if ($result) {
$msg = '<div class="success_msg">
Product Updated</div>';
} else {
$msg = '<div class="error_msg">Uppdateringen av produkt misslyckades. Var snäll och försök igen senare!</div>';
}
}
}
// Fetch user by id
try {
$query = "
SELECT * FROM products
WHERE id = :id;
";
$stmt = $dbconnect->prepare($query);
$stmt->bindvalue(':id', $_GET['id']);
$stmt->execute();
// fetch() fetches 1 record, fetchAll() fetches alla records
$product = $stmt->fetch();
} catch (\PDOException $e) {
throw new \PDOException($e->getMessage(), (int) $e->getCode());
}
?>
<?php require('include/navbar.php')?>
<div class="modal-dialog">
    <div class="modal-content">
        <form method="POST" action="#">
            <div class="modal-header">
                <a class="navbar-brand" href="manage product.php"  >To &nbsp; Manage<b>&nbsp;Product</b></a>
                <legend> UPDATE PRODUCT
                    
                    <?=$msg?>
                </legend>
                <div class="form-group">
                    <label for="input1" >TITEL:</label> <br>
                    
                    <input type="text"  class="form-control"name="title" value="<?=htmlentities($product['title'])?>">
                </div>
                <div class="form-group">
                    <label for="input1">DESCRIPTION:</label> <br>
                    <input type="text"  class="form-control" name="description" value="<?=htmlentities($product['description'])?>">
                </div>
                <div class="form-group">
                    <label for="input2">PRICE:</label> <br>
                    <input type="price"  class="form-control" name="price">
                </div>
                
                
                <div class="form-group">
                    <button type="submit" class="btn btn-info " name="register" value="update">UPDATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>