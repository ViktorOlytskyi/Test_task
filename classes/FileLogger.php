<?php
class FileLogger extends Logger
{
    private static $path = '';

    public static function logTo(string $path)
    {
        self::$path = $path;
    }

    public static function logItem(string $string)
    {
        \file_put_contents(self::$path, $string.PHP_EOL, FILE_APPEND);
    }
}