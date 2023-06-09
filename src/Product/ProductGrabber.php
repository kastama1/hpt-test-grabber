<?php

declare(strict_types=1);

namespace HPT\Product;

use HPT\Grabber;
use Symfony\Component\DomCrawler\Crawler;

class ProductGrabber implements Grabber
{
    public function getProduct(string $manufacturerCode)
    {
        $searchPage = file_get_contents("https://www.czc.cz/$manufacturerCode/hledat");
        $crawler = new Crawler($searchPage);
        $product = $crawler->filter('.new-tile')->first();

        if ($product->count()) {
            $product->filter('.tile-link')->attr('href');
            $productPage = file_get_contents("https://www.czc.cz/$manufacturerCode/hledat");
            $crawler = new Crawler($productPage);

            return $crawler;
        }

        return false;
    }

    public function getPrice(Crawler $product): float
    {
        return (float) filter_var($product->filter('.price-vatin')->text(), FILTER_SANITIZE_NUMBER_FLOAT);
    }

}