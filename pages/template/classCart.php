<?php
include_once 'classBDD.php';

class Cart
{
    public array $cart = [];

    public function addToCart($id, $quantity, bool $add)
    {
        $exist = false;
        if (!isset($_SESSION['cart']->cart[$id])) {
            $this->cart[$id] =  [
                'productId' => $id,
                'quantity' => $quantity
            ];
        } else {
            foreach ($this->cart as $key => $value) {
                if ($id == $this->cart[$key]['productId']) {
                    var_dump($this->cart);
                    if ($add) {
                        $this->cart[$id]['quantity'] = $quantity;
                    } else {
                        $this->cart[$id]['quantity'] += $quantity;
                    }


                    $exist = true;
                }
                if (!$exist) $this->cart[$id] =  [
                    'productId' => $id,
                    'quantity' => $quantity
                ];
            }
        }
    }
    public function removeFromCart($productKey)
    {
        foreach ($this->cart as $key => $value) {
            if ((int)$productKey == (int)$this->cart[$key]['productId']) {
                unset($this->cart[$key]);
                header('location: cart.php');
            }
        }
    }

    public function getCartItems()
    {
        if (!isset($_SESSION['cart'])) {
            return 0;
        }

        return count($_SESSION['cart']);
    }

    public function calculFraisDP($poids, $prix, $transporteur)
    {

        if ($poids < 500) {
            $fraisPort = 500 + (int) $transporteur;
        } else if ($poids < 2000) {
            $fraisPort = 0.1 * $prix + (int) $transporteur;
        } else {
            $fraisPort = 0 + (int) $transporteur;
        }
        return $fraisPort;
    }

    
}
