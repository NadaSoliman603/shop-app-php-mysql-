<?php 
    class Cart{
        public $db = null;

        public function  __construct(DBControler $db) {
            if(!isset($db->con))return null;
            $this->db = $db;
        }

        public function insertIntoCart ($params = null , $table =  'cart'){
            if($this->db->con != null){
                if($params != null){

                    //get table colums 
                    $colums = implode(',', array_keys($params));
                    $value = implode(',', array_values($params));

                    //creat sql query
                    $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)" , $table , $colums , $value);

                    //execut query
                    $result = $this->db->con->query($query_string);
                    echo($result);

                    return $result;
                }
            }
            
           //echo(gettype($query_string ));      
           
          
        }
        



        public  function addToCart($userid , $itemid ){
            if (isset($userid) && isset($itemid)){
                $params = array(
                    "user_id" => $userid,
                    "item_id" => $itemid
                );
               // insert data into cart
                $result = $this->insertIntoCart($params);
                if ($result){
                    // Reload Page;
                    header("Location" .  $_SERVER['PHP_SELF']);
                }
                return $result;
            
            }
        }

        //delete from cart 
        public function deletefromCart($itemid = null , $table = "cart"){
            if($this->db->con != null && $itemid != null){
                $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$itemid}");
                if($result){
                    header("Location" .  $_SERVER['PHP_SELF']);
                }
                echo $result;
                return $result;
            }
        }


    //get array of item_id in cart 
        public function getCartId($cartArray = null, $key = "item_id"){
            if ($cartArray != null){
                $cart_id = array_map(function ($value) use($key){
                    return $value[$key];
                }, $cartArray);
                return $cart_id;
            }
        }


       // add to whishlist && delete from cart
        public function addToWhishlist($item_id = null, $saveTable = "wishlist", $fromTable = "cart")
        {
            
                if( $this->db->con != null && $item_id != null){
                    
                    $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
                    $query2 = "DELETE FROM {$fromTable} WHERE item_id={$item_id}";

                    $result = $this->db->con->query($query);
                    $result = $this->db->con->query($query2);

                    if($result){
                        header("Location" .  $_SERVER['PHP_SELF']);
                    }
                    
                    return $result;
                    
            }
        }
        

    }