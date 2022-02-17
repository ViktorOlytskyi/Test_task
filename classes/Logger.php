<?php

abstract class Logger implements Logable
{
    abstract public static function logTo(string $string);
}
