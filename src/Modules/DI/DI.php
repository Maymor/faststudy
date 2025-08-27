<?php

namespace Dmitry\Faststudy\Modules\DI;

class DI
{
    protected array $container = [];

    public function set(string $key, mixed $module): void
    {
        $this->container[$key] = $module;
    }

    public function get(string $key): mixed
    {
        return $this->has($key) ? $this->container[$key] : null;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->container);
    }
}