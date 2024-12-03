<?php

$input = file_get_contents('adv3.txt');

$pattern = '/mul\((\d+),(\d+)\)/';
$pattern = '/(mul\((-?\d+),(-?\d+)\)|do(n\'t)?\(\))/';


preg_match_all($pattern, $input, $matches);

$sum = 0;

$do = true;

for ($i = 0; $i < count($matches[0]); $i++) {

    if ($matches[0][$i] === "don't()") {
        $do = false;
    } else if ($matches[0][$i] === "do()") {
        $do = true;
    } else {
        if ($do) {

            $liczby = explode(',', $matches[0][$i]);

            $int1 = preg_replace('/[^0-9]/', '', $liczby[0]);
            $int2 = preg_replace('/[^0-9]/', '', $liczby[1]);

            $sum += $int1 * $int2;
        }
    }
}

echo $sum;
