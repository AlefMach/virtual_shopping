<?php

use PHPUnit\Framework\TestCase;

include './domain/cart/CartDomain.php';

class CartDomainTest extends TestCase {
    /**
     * Testa o cálculo do preço total, incluindo a taxa de imposto.
     *
     * @dataProvider totalPriceDataProvider
     * @param float $price O preço do produto.
     * @param string $taxRate A taxa de imposto no formato percentual.
     * @param float $expectedTotalPrice O preço total esperado após o cálculo.
     */
    public function testCalculateTotalPriceWithTax($price, $taxRate, $expectedTotalPrice) {
        // Arrange & Act
        $totalPrice = CartDomain::getTotalPrice($price, $taxRate);

        // Assert
        $this->assertEquals($expectedTotalPrice, $totalPrice, "Falha no cálculo do preço total com taxa de imposto. (Preço: $price, Taxa: $taxRate)");
    }

    /**
     * Fornecedores de dados para o teste de cálculo do preço total.
     *
     * @return array Conjunto de dados com preço, taxa de imposto e preço total esperado.
     */
    public function totalPriceDataProvider() {
        return [
            [10, '30%', 13],
            [15, '20%', 18],
            [8, '10%', 8.80],
            [25, '15%', 28.75],
            [12.5, '25%', 15.63],
        ];
    }
}
