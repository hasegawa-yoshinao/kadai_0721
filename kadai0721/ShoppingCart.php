<?php
class ShoppingCart {
    private $items = array();

    public function addItem($productId, $quantity = 1) {
        if ($quantity < 1) {
            throw new Exception("Quantity must be at least 1.");
        }

        if (isset($this->items[$productId])) {
            $this->items[$productId] += $quantity;
        } else {
            $this->items[$productId] = $quantity;
        }
    }

    public function removeItem($productId, $quantity = 1) {
        if ($quantity < 1) {
            throw new Exception("Quantity must be at least 1.");
        }

        if (isset($this->items[$productId])) {
            if ($this->items[$productId] <= $quantity) {
                unset($this->items[$productId]);
            } else {
                $this->items[$productId] -= $quantity;
            }
        }
    }

    public function getTotalPrice($products) {
        $total = 0;
        foreach ($this->items as $productId => $quantity) {
            if (isset($products[$productId])) {
                $total += $products[$productId]['price'] * $quantity;
            }
        }
        return $total;
    }

    public function getItems() {
        return $this->items;
    }

    public function clear() {
        $this->items = array();
    }
}
?>
