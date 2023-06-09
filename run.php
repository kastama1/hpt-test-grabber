<?php

declare(strict_types=1);

require_once('vendor/autoload.php');

use HPT\Product\ProductDispatcher;
use HPT\Product\ProductGrabber;
use HPT\Product\ProductOutput;

$dispatcher = new ProductDispatcher('input.txt', new ProductGrabber(), new ProductOutput());
echo $dispatcher->run();
