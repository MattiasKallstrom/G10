<?php
require('../src/config.php');
require('../src/dbconnect.php');

// if (empty($_SESSION['cartItems'])) {
//  header('location: index.php');
//  exit;
// }
$pageTitle = 'Check Out';
$error = '';

if(!isset($_SESSION['user'])){
require_once("../layout/header.php");
}else{
require_once("../layout/header-signed-in.php");

}
// unset($_SESSION['cartItems']);

?>
<div class="container col-xl-8">
  <h2 class="form-title mt-5 ">Your Order:</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th style="width: 10%">Product</th>
        <th style="width: 50%">Info</th>
        <th style="width: 10%"></th>
        <th style="width: 10%">Quantity</th>
        <th style="width: 20%">Price per product</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['cartItems'] as $cartId => $cartItem) {?>
      
      <tr>
        <td><img src=<?=htmlentities($cartItem['img_url'])?> style="height: 4rem; width:6rem"  class="card-img-top align-self-center" alt="..." ></td>
        <td><p class="card-text"><?=htmlentities($cartItem['description'])?>  ...</p></td>
        <td>
          <form action="delete-cart-item.php" method="POST">
            <input type="hidden" name="cartId" value="<?=$cartId?>">
            <button type="submit" style="color: red" class="btn">
            <svg class="bi bi-trash" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor"      xmlns="http://www.w3.org/2000/svg">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1      0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1       0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0       1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
            </button>
          </form>
        </td>
        <td>
          <form class ="update-cart-form" action="update-cart-item.php"  method="POST">
            <input type="hidden" name="cartId" value="<?=$cartId?>">
            <input type="number" name="quantity" value="<?=$cartItem['quantity']?>" min="0">
          </form>
        </td>
        <td><p class="price"><?=htmlentities($cartItem['price'])?> $</p></td>
      </tr>
      <?php } ?>


    <tr class="border-top">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class="mr-2"><b>Totalt: </b><?= $cartTotalSum ?> $</td>

    </tr>


      
    </tbody>
  </table>
  <?php echo $error;?>
<form action="create-order.php" method="POST">
  <input type="hidden" name="totalPrice" value="<?= $cartTotalSum ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Förnamn</label>
      <input type="text" class="form-control" name="firstName" id="inputEmail4" placeholder="Förnamn">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Efternamn</label>
      <input type="text" class="form-control" name="lastName" id="inputPassword4" placeholder="Efternamn">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">E-post</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="E-post">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Lösenord</label>
      <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Lösenord">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">Adress</label>
    <input type="text" class="form-control" name="street" id="inputAddress" placeholder="Katarinagatan 121">
  </div>
<div class="form-group col-md-6">
      <label for="inputZip">Telephone</label>
      <input type="text" name="phone" class="form-control" id="inputZip" value="070-000-00-00"> 
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Stad</label>
      <input type="text" name="city" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Land</label>
      <select id="inputState" name="country" class="form-control">
        <option value="SE">Sverige</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Postnummer</label>
      <input type="text" name="postalCode" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Jag har läst och godkänner villkoren.
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="createOrderBtn">Purchase</button>
</form>






</div>

<!-- Java script -->
<script type="text/javascript">
  $('.update-cart-form input[name="quantity"]').on('change', function(){
    $(this).parent().submit();

  });

</script>