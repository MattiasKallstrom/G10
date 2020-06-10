<?php
require('../src/config.php');
require('../src/dbconnect.php');
$pageTitle = 'Check Out';

if (empty($_SESSION['cartItems'])) {
 header('location: index.php');
 exit;
}
unset ($_SESSION['cartItems']);
if(!isset($_SESSION['user'])){
require_once("../layout/header.php");
}else{
require_once("../layout/header-signed-in.php");
}
?>

<div class="container col-xl-8">
  <table class="table">
    <br>
  <h1 class="">Tack för din order!</h1>
<p>Vi har tagit emot din order och kommer behandla detta så fort som möjligt. Du kommer få en orderbekräftelse via e-post. Vid frågor var snäll och kontakta oss på bla bla bla...</p>
</brr>
    <thead class="thead-dark">
      <tr>
        <th style="width: 10%">Product</th>
        <th style="width: 50%">Info</th>
        <th style="width: 10%">Quantity</th>
        <th style="width: 15%">Price per product</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['cartItems'] as $cartId => $cartItem) {?>
      
      <tr>
        <td>img</td>
        <td><?=$cartItem['description']?></td>
        <td><?=$cartItem['quantity']?></td>
        <td><?=$cartItem['price']?></td>
        
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


</div>

<!-- Java script -->
<script type="text/javascript">
  $('.update-cart-form input[name="quantity"]').on('change', function(){
    $(this).parent().submit();

  });

</script>