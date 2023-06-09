<?php

declare(strict_types=1);

namespace HPT;

use Symfony\Component\DomCrawler\Crawler;

interface Grabber
{
    public function getPrice(Crawler $product): ?float;

    public function getName(Crawler $product): ?string;

    public function getRating(Crawler $product): ?float;
}
