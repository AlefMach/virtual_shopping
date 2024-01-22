<?php

use PHPUnit\Framework\TestCase;

// Include the file containing the class to be tested
include './domain/products/ProductDomain.php';

/**
 * Test class for the ProductDomain class.
 */
class ProductDomainTest extends TestCase {
    /**
     * Tests the convertTaxRatesToPercentage method.
     */
    public function testConvertTaxRatesToPercentage() {
        // Create two stdClass objects simulating product types with different tax rates
        $productType1 = (object) ['tax_rate' => 0.15];
        $productType2 = (object) ['tax_rate' => 0.05];

        // Create a Collection instance with the created objects
        $productTypes = collect([$productType1, $productType2]);

        // Call the method to be tested
        $convertedProductTypes = ProductDomain::convertTaxRatesToPercentage($productTypes);

        // Perform assertions to verify if the method is working correctly
        $this->assertCount(2, $convertedProductTypes);
        $this->assertEquals('0.15%', $convertedProductTypes[0]->tax_rate);
        $this->assertEquals('0.05%', $convertedProductTypes[1]->tax_rate);
    }

    /**
     * Tests the convertTaxRatesToPercentage method with rounding.
     */
    public function testConvertTaxRatesToPercentageWithRounding() {
        // Create an stdClass object simulating a product type with a specific tax rate
        $productType = (object) ['tax_rate' => 0.066];

        // Create a Collection instance with the created object
        $productTypes = collect([$productType]);

        // Call the method to be tested
        $convertedProductTypes = ProductDomain::convertTaxRatesToPercentage($productTypes);

        // Perform assertions to verify if the method is working correctly with rounding
        $this->assertCount(1, $convertedProductTypes);
        $this->assertEquals('0.07%', $convertedProductTypes[0]->tax_rate);
    }

    /**
     * Tests the convertTaxRatesToPercentage method with zero tax rate.
     */
    public function testConvertTaxRatesToPercentageWithZero() {
        // Create an stdClass object simulating a product type with zero tax rate
        $productType = (object) ['tax_rate' => 0.0];

        // Create a Collection instance with the created object
        $productTypes = collect([$productType]);

        // Call the method to be tested
        $convertedProductTypes = ProductDomain::convertTaxRatesToPercentage($productTypes);

        // Perform assertions to verify if the method is working correctly with zero tax rate
        $this->assertCount(1, $convertedProductTypes);
        $this->assertEquals('0.00%', $convertedProductTypes[0]->tax_rate);
    }
}
