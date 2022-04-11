<?php 
    // include header section
    ob_start();
    include('header.php');

 //include car  section
    count($product->getData('cart')) ? include('Template/cart.php') : include('Template/notFound/_cart.php');

  //include whishlist  section

  count($product->getData('wishlist')) ? include('Template/_wishList.php') : include('Template/notFound/_wishList.php');

 
?>




<?php 
 // include footer section
    include('footer.php');
?>