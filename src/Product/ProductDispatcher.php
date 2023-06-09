<?php

declare(strict_types=1);

namespace HPT\Product;

use HPT\Dispatcher;

class ProductDispatcher extends Dispatcher
{
    private string $filename;

    public function __construct(string $filename, ProductGrabber $grabber, ProductOutput $output)
    {
        $this->filename = $filename;

        parent::__construct($grabber, $output);
    }

    public function run(): string
    {
        if (!file_exists($this->filename)) {
            return "File $this->filename not found";
        }

        $manufacturerCodes = [];
        $manufacturerCodes = file($this->filename, FILE_IGNORE_NEW_LINES);

        if (!$manufacturerCodes) {
            return "File $this->filename is empty";
        }

        foreach ($manufacturerCodes as $code) {
            $product = $this->getGrabber()->getProduct($code);

            if ($product) {
                $productData['price'] = $this->getGrabber()->getPrice($product);
                $productData['title'] = $this->getGrabber()->getName($product);
                $productData['rating'] = $this->getGrabber()->getRating($product);

                $this->getOutput()->setProducts($code, $productData);
            }
        }

        return $this->getOutput()->getJson();
    }
}