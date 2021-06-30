<?php include_once('controllers/cart.inc.php'); ?>
<?php include_once('database/db.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php include_once('includes/header.php') ?>

    <div class="wrap">
        <main>

        <?php 

            $products = $db->getProducts();

            foreach($products as $product) {
                echo "<a href='product/" . $product['id'] . "/" . strtolower(str_replace(' ', '-', $product['name'])) . "'>";
                echo "<article>";
                echo "<img src='assets/images/" . $product['cover_img'] . "' alt='" . 
                $product['name'] . "'>"; 
                echo "<div class='img-ball-wrap'>";  
                echo "<div class='img-ball-bckg1'>";
                echo "<div class='img-ball-bckg2'>";
                echo "<img class='ball' src='assets/images/" . $product['img'] . "' alt='" . 
                $product['name'] . "'>"; 
                echo "</div>";
                echo "</div>";
                echo "</div>";
                if (isset($product['name_info'])) {
                    echo "<h3>" . $product['name'] . " <span>" . $product['name_info'] . 
                    "</span></h3>";   
                } else {
                    echo "<h3>" . $product['name'] . "</h3>";
                }
                echo "<h4>" . $product['description'] . "</h4>"; 
                echo "<div class='price-wrap'><span>" . $product['price'] . "$</span></div>"; 
                echo "</article>";
                echo "</a>";
            }

        ?>
        <!-- <article>
            <img src="images/world-cup-2002.png" alt="">
            <img class="ball" src="images/adidas-fevernova-winter.png" alt="">
            <h3>Adidas Fevernova <span>winter</span></h3>
            <p>Fifa World Cup 2002 official matchball</p>
            <div class="price-wrap"><span>50$</span></div>
        </article>
        <article>
            <img src="images/copa-america-2021.png" alt="">
            <img class="ball" src="images/nike-flight.png" alt="">
            <h3>Nike Flight</h3>
            <p>Copa America 2021 official matchball</p>
            <div class="price-wrap"><span>30$</span></div>
        </article>
        <article>
            <img src="images/copa-america-2021.png" alt="">
            <img class="ball" src="images/nike-flight-winter.png" alt="">
            <h3>Nike Flight <span>winter</span></h3>
            <p>Copa America 2021 official matchball</p>
            <div class="price-wrap"><span>30$</span></div>
        </article>
        <article>
            <img src="images/world-cup-2006.png" alt="">
            <img class="ball" src="images/adidas-teamgeist-final.png" alt="">
            <h3>Adidas Teamgeist <span>final</span></h3>
            <p>Fifa World Cup 2006 official matchball</p>
            <div class="price-wrap"><span>70$</span></div>
        </article> -->
        </main>
        <?php include_once('helpers/sideCart.php') ?>
    </div>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>               
