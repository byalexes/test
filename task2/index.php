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
    foreach ($randomWords as $value) {
        $color = color($words, $value);
        echo "<font color=\"$color\"> $value</font>";
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
