<?php 
    define ('BASE_URL', 'http://localhost/php_srb/footballshop/');
?>
<nav>
    <a href="<?= BASE_URL ?>home123.php">Football<span>s</span>hop</a>
    <div class="nav-top-right">
        <div class="night-mode-wrap">
            <ion-icon name="moon-outline"></ion-icon>
            <div class="night-mode-button-wrap">
                <input type="checkbox" id="switch">
                <label for="switch">
                    <div class="dark-mode-toggle"></div>
                </label>
            </div>
        </div>
        <div class="account-cart-wrap">
            <a href="login.php">login</a>
            <div class="cart-wrap">
                <?php if (!empty($_SESSION['cartItems'])) {
                    echo "<span>" . count($_SESSION['cartItems']) . "</span>";
                }
                ?>
                <ion-icon name="cart-outline"></ion-icon>
            </div>
        </div>
    </div>
</nav>