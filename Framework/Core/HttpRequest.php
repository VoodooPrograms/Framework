<?php


namespace Framework\Core;


use Framework\Core\Interfaces\Forwarder;

class HttpRequest extends Request implements Forwarder
{

    protected function launch()
    {
        $this->setPath($_SERVER["REQUEST_URI"]);
    }

    public function forward(string $path): void
    {
        // TODO: Implement forward() method.
    }
}