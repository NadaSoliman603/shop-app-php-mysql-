<?php
// require to database  file
require("database/controler.php");


// require to data  file
require("database/product.php");

// require to cart  file
require("database/cart.php");

//conected to database
$db = new DBControler();


//get product array data
$product = new Product($db);


// add to Cart 
$cart = new Cart($db);



