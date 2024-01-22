<?php

/**
 * Class CartDomain
 *
 * This class provides utility functions related to the shopping cart.
 */
class CartDomain {
    /**
     * Calculate the total price of a product including tax.
     *
     * @param float $price The base price of the product.
     * @param string $tax_rate The tax rate of the product in percentage.
     * @return float The total price including tax.
     */
    public static function getTotalPrice($price, $tax_rate) {
        // Remove '%' and convert the tax rate to a float
        $percentValue = floatval(str_replace('%', '', $tax_rate));

        // Calculate the total price including tax
        $total_price = (($price * $percentValue) / 100) + $price;

        return round($total_price, 2);
    }

}
