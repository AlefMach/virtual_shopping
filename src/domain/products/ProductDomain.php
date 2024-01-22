<?php

use Illuminate\Support\Collection;

class ProductDomain {
    /**
     * Converts a decimal number to a percentage string.
     *
     * @param array $productTypes The array of objects to be converted.
     * @return array The array with tax rates converted to percentage strings.
     */
    public static function convertTaxRatesToPercentage($productTypes) {
        // Crie uma instância da Collection
        $collection = new Collection($productTypes);

        // Use o método transform na Collection
        $transformed = $collection->transform(function ($item) {
            $item->tax_rate = number_format($item->tax_rate, 2, '.', '') . '%';
            return $item;
        });

        // Converta a Collection de volta para um array
        return $transformed->all();
    }
}
