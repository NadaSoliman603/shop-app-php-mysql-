   <!-- Shopping cart section  -->
    <?php 
        //post method 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //delete item from cart
                if(isset($_POST["delete_item_from_cart"])){
                    $deleteItem= $cart->deletefromCart($_POST['product_id']);
                }
                if(isset($_POST['product_wishlist_id'])){
                    $moveToCart = $cart->addToWhishlist($_POST['product_wishlist_id']);
                }
            }

       // if ($_SERVER['REQUEST_METHOD'] == 'POST'){}
    ?>

   <section id="cart" class="py-3">
                    <div class="container-fluid w-75">
                        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

                        <!--  shopping cart items   -->
                            <div class="row">
                                <div class="col-sm-9">
                                    <!-- cart item -->
                                    <?php 
                                        foreach($product->getData("cart") as $item):
                                        $cart = $product->getProductByID($item['item_id']);                                  
                                        $subtotal = array_map(function($cartProduct){
                                    ?>
                                    
                                        <div class="row border-top py-3 mt-3">
                                            <div class="col-sm-2">
                                                <img src="<?php echo$cartProduct["item_image"]?>" style="height: 120px;" alt="cart1" class="img-fluid">
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="font-baloo font-size-20"><?php echo$cartProduct["item_name"]?></h5>
                                                <small>by <?php echo$cartProduct["item_brand"]?></small>
                                                <!-- product rating -->
                                                <div class="d-flex">
                                                    <div class="rating text-warning font-size-12">
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="far fa-star"></i></span>
                                                      </div>
                                                      <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                                                </div>
                                                <!--  !product rating-->

                                                <!-- product qty -->
                                                    <div class="qty d-flex pt-2">
                                                        <div class="d-flex font-rale w-25">
                                                            <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                                            <input type="text" data-id="pro1" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                                            <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                                        </div>
                                                        <form action="" method="post">
                                                            <input name = "product_id"  type="hidden" value = "<?php echo$cartProduct["item_id"] ?>">
                                                            <button type="submit" name="delete_item_from_cart" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                                        </form>

                                                        <form action="" method="post">
                                                            <input name = "product_wishlist_id"  type="hidden" value = "<?php echo$cartProduct["item_id"] ?>">
                                                            <button type="submit" name="move_to_cart" class="btn font-baloo text-danger px-3 border-right">Save For Leter</button>
                                                        </form>
                                                        
                                                    </div>
                                                <!-- !product qty -->

                                            </div>

                                            <div class="col-sm-2 text-right">
                                                <div class="font-size-20 text-danger font-baloo">
                                                    $<span class="product_price"><?php echo$cartProduct["item_price"]?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php  
                                         },$cart);
                                        endforeach;
                                        ?>
                                    <!-- !cart item -->


                                </div>
                                <!-- subtotal section-->
                                <div class="col-sm-3">
                                    <div class="sub-total border text-center mt-2">
                                        <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                                        <div class="border-top py-4">
                                            <h5 class="font-baloo font-size-20">Subtotal (2 item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price">152.00</span> </span> </h5>
                                            <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- !subtotal section-->
                            </div>
                        <!--  !shopping cart items   -->
                    </div>
                </section>
            <!-- !Shopping cart section  -->
