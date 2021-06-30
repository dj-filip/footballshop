<?php 
    session_start();

    if(!isset($_SESSION['cartItems']))
    $_SESSION['cartItems'] = [];

    class Cart{
        public $cartItems;

        function __construct(){
            $this->cartItems = $_SESSION['cartItems'];
        }
        function addProduct($id, $name, $img, $price, $amount){
            $found = false;
            for($i=0; $i<count($this->cartItems); $i++){
                if($this->cartItems[$i]['id'] == $id){
                    $this->changeAmount($id, $amount);
                    $found = true;
                    break;
                }
            }
            if($found == false){
                $newItem = ['id'=>$id, 'name'=>$name, 'img'=>$img, 'price'=>$price, 'amount'=>$amount];
                array_push($this->cartItems, $newItem);
            }
            $_SESSION['cartItems'] = $this->cartItems;
        }
        function changeAmount($id, $amount){
            for($i=0; $i<count($this->cartItems); $i++){
                if($this->cartItems[$i]['id'] == $id){
                    $this->cartItems[$i]['amount'] += $amount;
                    if($this->cartItems[$i]['amount'] <= 0)
                        $this->removeProduct($id);
                    break;
                }
            }
            $_SESSION['cartItems'] = $this->cartItems;
        }
        function removeProduct($id){
            for($i=0; $i<count($this->cartItems); $i++){
                if($this->cartItems[$i]['id'] == $id){
                    array_splice($this->cartItems, $i, 1);
                    break;
                }
            }
            $_SESSION['cartItems'] = $this->cartItems;
        }
        function total(){
            $s = 0;
            for($i=0; $i<count($this->cartItems); $i++){
                $u = $this->cartItems[$i]['price'] * $this->cartItems[$i]['amount'];
                $s += $u;
            }
            return $s;
        }
        function show(){
            echo "<table border='1'>";
            $s = 0;
            for($i=0; $i<count($this->cartItems); $i++){
                $u = $this->cartItems[$i]['price'] * $this->cartItems[$i]['amount'];
                $s += $u;
                echo "<tr>";
                echo "<td>".$this->cartItems[$i]['name']."</td>";
                echo "<td>".$this->cartItems[$i]['price']."</td>";
                echo "<td>".$this->cartItems[$i]['amount']."</td>";
                echo "<td>".$u."</td>";
                echo "<td><a href='cart.php?action=add&product_id=".$this->cartItems[$i]['id']."'><button style='font-size:3em'>+</button></a></td>";
                echo "<td><a href='cart.php?action=subtract&product_id=".$this->cartItems[$i]['id']."'><button style='font-size:3em'>-</button></a></td>";

                echo "<td><a href='cart.php?action=remove&product_id="
                    .$this->cartItems[$i]['id']."'>REMOVE</a></td>";
                echo "</tr>";
            }
            echo "<tr><td colspan='3' style='text-align:right'>TOTAL:</td><td>$s</td></tr>";
            echo "</table>";
        }

        function show_2(){
            $s = 0;
            $count = 0;
            echo "<div class='cart-items-wrap'>";
            echo "<h3>Cart Items</h3>";
            for($i=0; $i<count($this->cartItems); $i++){
                $u = $this->cartItems[$i]['price'] * $this->cartItems[$i]['amount'];
                $s += $u;
                $count++;
                        echo "<div class='item-wrap'>";
                            echo "<div class='item-wrap-row'>";
                                echo "<div class='img-wrap'>";
                                    echo "<img src='assets/images/" . $this->cartItems[$i]['img'] . "'>";
                                echo "</div>";
                                echo "<h4>" . $this->cartItems[$i]['name'] . " </h4>";
                                echo "<h4> " .  $this->cartItems[$i]['price'] . "$</h4>";
                            echo "</div>";
                        echo "</div>";
                    }
                    echo "<h3>total: " . $s . "$</h3>";
                    echo "</div>";
                return $count;
        }
    }   
    $c = new Cart();




?>