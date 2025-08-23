<?php
namespace Dmitry\Faststudy\Services\Storage;

class FileStorage
{
    public static function getTasksPath(): string
    {
        $ds = DIRECTORY_SEPARATOR;
        return dirname(__DIR__, 3) . $ds . 'data'. $ds .'tasks.json';
    }
}