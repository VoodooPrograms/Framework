<?php


namespace Framework\Core;


use Framework\Core\Interfaces\Forwarder;

class HttpRequest extends Request implements Forwarder
{

    protected function launch()
    {
        // TODO: Implement launch() method.
    }

    public function forward(string $path): void
    {
        // TODO: Implement forward() method.
    }
}