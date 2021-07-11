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
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

    <?php  

        if(!isset($_GET['id'])) {
            echo 'Page Not Found!';
        }

        $id = $_GET['id'];
        $product = $db->getProduct($id);
        // $color1 = substr(0, strpos($product['color'], "-"));
        $color1 = substr($product['color'], 0, strpos($product['color'], "-"));
        $color2 = substr($product['color'], strpos($product['color'], "-")+1);

        // echo "<pre>" , print_r($color2, true) , "</pre>";
        // exit();
        include_once('includes/header.php');
        
    ?>

    <div class="wrap">   
        <main class="details">
        
            <section>
                <div class="nav-path">
                    <ul>
                        <li><a href="../../home123.php">Footballshop</a></li>
                        <li><a href=""><?= $product['name'] ?></a></li>
                    </ul>
                </div>
                <div class="top-wrap">
                <div class="image-wrap">
                    <img src="../../assets/images/<?= $product['img'] ?>" alt="">
                </div>
                    <div class="title-wrap">
                        <?php if (isset($product['name_info'])) {
                            echo "<h2>" . $product['name'] . " <span>" . $product['name_info'] . 
                            "</span></h2>";   
                        } else {
                            echo "<h2>" . $product['name'] . "</h2>";
                        }
                        ?>
                        <h4><?= $product['description'] ?></h4>
                        <h4><?= $product['price'] ?></h4>
                        <div class="buttons-wrap">
                            <form action='../../cart.php'>
                                <input type='hidden' name='action' value='add'>
                                <input type='hidden' name='product_id' value='<?= $product['id']?>'>
                                <button type="submit">add to cart</button>
                            </form>
                            <div><ion-icon name="heart-outline"></ion-icon></div>
                        </div>
                    </div>
                </div>
                <div class="tags-wrap">
                    <!-- ul li -->
                    <div class="tag-wrap">
                        <span class="circle"></span>
                        <span>adidas</span>
                    </div>
                    <div class="tag-wrap">
                        <span class="circle"></span>
                        <span>world cup 2002</span>
                    </div>
                    <div class="tag-wrap">
                        <span class="circle"></span>
                        <span>winter</span>
                    </div>
                    <div class="tag-wrap">
                        <span class="circle"></span>
                        <span>fevernova</span>
                    </div>
                </div>        
                <p><?= $product['body'] ?></p>
                    <div class="colors-wrap">
                        <h4>COLOR</h4>
                        <span style="background-color: <?= $color1?>;"></span>
                        <span style="background-color: <?= $color2?>;"></span>
                    </div>
            </section>
            <div class="cart-box">
                <div class="cart-box-top">
                    <h2>Item added to your cart</h2>
                    <span>X</span> 
                </div>
            
            </div>
        </main>
        <?php include_once('helpers/sideCart.php') ?>

    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../../assets/js/main-2.js"></script>
    <script src="../../assets/js/nightmode.js"></script>
</body>
</html>              