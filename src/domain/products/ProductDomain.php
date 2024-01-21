<?php

class ProductDomain {
    /**
     * Converts a decimal number to a percentage string.
     *
     * @param float $decimalNumber The decimal number to be converted to a percentage.
     * @return string The percentage string.
     */
    public static function convertTaxRatesToPercentage($productTypes) {
        $productTypes->transform(function ($item) {
            $item->tax_rate = number_format($item->tax_rate, 2, '.', '') . '%';
            return $item;
        });

        return $productTypes;
    }
}