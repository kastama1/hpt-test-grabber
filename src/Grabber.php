<?php

declare(strict_types=1);

namespace HPT;

use Symfony\Component\DomCrawler\Crawler;

interface Grabber
{
    public function getPrice(Crawler $product): float;
}
