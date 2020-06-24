<?php
require('../src/config.php');
require('../src/dbconnect.php');
$pageTitle = 'Check Out';

// if (empty($_SESSION['cartItems'])) {
//  header('location: index.php');
//  exit;
// }
unset ($_SESSION['cartItems']);
if(!isset($_SESSION['user'])){
require_once("../layout/header.php");
}else{
require_once("../layout/header-signed-in.php");
}
?>

<div class="container col-xl-8 col-xs-2">
  <table class="table">
    <br>
  <h1 class="tack-header form-title d-flex justify-content-center mt-5  "><svg class="d-flex justify-content-center bi bi-check " width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
</svg>Tack för din order!</h1>
<p>Vi har tagit emot din order och kommer behandla detta så fort som möjligt. Du kommer få en orderbekräftelse via e-post. Vid frågor var snäll och kontakta oss på bla bla bla...</p>
</br>
    <!-- <div style="width:100%;height:0;padding-bottom:100%;position:relative;"><iframe src="https://giphy.com/embed/3oKIP9cJEOO9ljKoCc" width="100%" height="40%" style="position:absolute" frameBorder="0" class="giphy-embed" ></iframe></div><p></p>


</div> -->

<!-- Java script -->
<script type="text/javascript">
  $('.update-cart-form input[name="quantity"]').on('change', function(){
    $(this).parent().submit();

  });

</script>