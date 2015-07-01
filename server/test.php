<?php
//require_once __DIR__ . '/vendor/autoload.php';
foreach(glob('{' . __DIR__ . '/classes/model/*.php}',GLOB_BRACE) as $filename)
{
    include_once $filename;
}