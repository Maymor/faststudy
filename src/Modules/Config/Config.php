<?php

namespace Dmitry\Faststudy\Modules\Config;

class Config
{
    protected string $base_path;
    protected string $config_path;
    public function __construct()
    {
        $this->base_path = dirname($_SERVER['DOCUMENT_ROOT']);
        $this->config_path = $this->base_path . '/configs';
    }

    public function printPath(): void
    {
        echo $this->config_path;
        echo "\n";
        echo $this->base_path;
    }
}