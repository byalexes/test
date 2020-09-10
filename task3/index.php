#!/usr/bin/php
<?php

$arData = explode(" ", $argv[1]);

foreach ($arData as $value)
{
    $intValue = (int)$value;
    if ($value == "$intValue") $arInt[] = $value;
}

if ($arInt)
{
    $res = array_unique($arInt);
    sort($res);
    $res = implode(" ", $res);
    echo $res;
}