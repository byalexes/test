<?php

$words = [
    'red',
    'blue',
    'green',
    'yellow',
    'lime',
    'magenta',
    'black',
    'gold',
    'gray',
    'tomato'];

$words = array_flip($words);

for ($i = 0; $i<5; $i++) {
    $randomWords = array_rand($words, 5);
    foreach ($randomWords as $key) {
        $color = color($words, $key);
        echo "<font color=\"$color\"> $key</font>";
    }
    echo "<br />";
}

function color($words, $color)
{
    do {
        $newColor = array_rand($words);
    } while ($newColor == $color);
    return $newColor;
}
