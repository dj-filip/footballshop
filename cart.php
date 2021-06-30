<?php
    include_once('database/db.php');
    include_once('controllers/cart.inc.php');

    if(isset($_GET['action']) && $_GET['action'] == 'add'){
        $id = $_GET['product_id'];
        $product = $db->getProduct($id);
        $c->addProduct($id, $product['name'], $product['img'], $product['price'], 1);        
    }
    if(isset($_GET['action']) && $_GET['action'] == 'subtract'){
        $id = $_GET['product_id'];
        $c->changeAmount($id, -1);        
    }
    if(isset($_GET['action']) && $_GET['action'] == 'remove'){
        $id = $_GET['product_id'];
        $c->removeProduct($id);
    }
    header("Location: home123.php");

?>


