<?php

declare(strict_types=1);

namespace HPT\Product;

use HPT\Output;

class ProductOutput implements Output
{
    private array $products = [];

    public function setProducts(string $productId, array $products)
    {
        $this->products[$productId] = $products;
    }


    public function getJson(): string
    {
        return json_encode($this->products);
    }
}