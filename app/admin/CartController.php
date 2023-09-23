<?php
    if(!isset($_SESSION)){
        session_start();
    }
    Class Cart{

        public function addtocart($pid, $qty,$size)
        {
            $_SESSION['cart'][$pid]['qty'] = $qty;
            $_SESSION['cart'][$pid]['size'] = $size;
        }

        public function updatecart($pid, $qty)
        {
            if(isset($_SESSION['cart'][$pid])):
                $_SESSION['cart'][$pid]['qty'] = $qty;
            endif;
        }
        public function updatecartsize($pid,$size){
            if(isset($_SESSION['cart'][$pid])):
                $_SESSION['cart'][$pid]['size'] = $size;
            endif;

        }
        
        public function removecart($pid)
        {
            if(isset($_SESSION['cart'][$pid])):
                unset($_SESSION['cart'][$pid]);
            endif;
        }

        public function emptycart()
        {
            if(isset($_SESSION['cart'])){
                unset($_SESSION['cart']);
            }
        }

        public function totalProduct()
        {
            if(isset($_SESSION['cart'])):
                return count($_SESSION['cart']);
            else:
                return 0;
            endif;
        }

    }
?>