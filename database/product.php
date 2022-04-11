<?php
class Product{
    public $db = null;

    public function __construct(DBControler $db ){
        if(!isset($db->con))return null;
        $this->db = $db;
    }

    // fetch product data using getData Method
    public function getData($table = 'product'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch product data one by one
        
        
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
                $resultArray[] = $item;
            }
        
        
        return $resultArray;
    }

    //get product using item id 
    public function getProductByID($item_id = null,  $table = "product"){
        if(isset($item_id )){
            $product = $this->db->con->query("SELECT * FROM {$table}  WHERE item_id= {$item_id}");

            $productArray = array();
            while ( $item = mysqli_fetch_array($product , MYSQLI_ASSOC)){
                $productArray[] = $item;
            }
        }
        return $productArray;
    }

    
};