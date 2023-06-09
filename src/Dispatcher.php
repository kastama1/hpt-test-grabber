<?php

declare(strict_types=1);

namespace HPT;

class Dispatcher
{
    private Grabber $grabber;
    private Output $output;

    public function __construct(Grabber $grabber, Output $output)
    {
        $this->grabber = $grabber;
        $this->output = $output;
    }

    /**
     * @return string JSON
     */
    public function run(): string
    {
        return $this->output->getJson();
    }

    /**
     * @return Grabber
     */
    public function getGrabber(): Grabber
    {
        return $this->grabber;
    }

    /**
     * @return Output
     */
    public function getOutput(): Output
    {
        return $this->output;
    }
}
