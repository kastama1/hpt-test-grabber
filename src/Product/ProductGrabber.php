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
            $productUrl = $product->filter('.tile-link')->attr('href');
            $productPage = file_get_contents("https://www.czc.cz$productUrl");

            return new Crawler($productPage);
        }

        return false;
    }

    public function getPrice(Crawler $product): ?float
    {
        $container = $product->filter('.pd-wrap .total-price .price-vatin');

        if ($container->count()) {
            return (float) filter_var($container->innerText(),
                FILTER_SANITIZE_NUMBER_FLOAT);
        }
        return null;
    }

    public function getName(Crawler $product): ?string
    {
        $container = $product->filter('.pd-wrap h1');

        if ($container->count()) {
            return $container->innerText();
        }

        return null;
    }

    public function getRating(Crawler $product): ?float
    {
        $container = $product->filter('.pd-header .rating');

        if ($container->count()) {
            return (float) filter_var($container->innerText(), FILTER_SANITIZE_NUMBER_FLOAT);
        }

        return null;
    }
}