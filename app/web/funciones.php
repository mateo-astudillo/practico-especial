<?php

function get_letters_array($array_size, $only_upper): array {
    $array = [];
    for ($i = 0; $i < $array_size; $i++) {
        array_push($array, letra_random($only_upper));
    }
    return $array;
}

function letra_random($only_upper): string {
    $alphabet = "abcdefghigkmnlopqrstuvwxyz";
    $letter = $alphabet[rand(0, strlen($alphabet) - 1)];
    if (rand(0, 1) == 1 || $only_upper)
        $letter = strtoupper($letter);
    return $letter;
}

function letter_in_array(&$array, $letter): bool {
    for ($i = 0; $i < sizeof($array); $i++) {
        if (strcmp($array[$i], $letter) == 0)
            return true;
    }
    return false;
}

function number_of_letter(&$array, $letter): int {
    $number = 0;
    for ($i = 0; $i < sizeof($array); $i++) {
        if (strcmp($array[$i], $letter) == 0)
            $number += 1;
    }
    return $number;
}

function associative_array(&$array): array {
    return array_count_values($array);
}

function associative_array_with_percentage(&$array) {
    $older_array = $array;
    $array = array_fill_keys($array, ["cantidad"=>0, "porcentaje"=>0]);
    $letters = array_keys($array);
    for ($i = 0; $i < sizeof($array); $i++) {
        $current_letter = $letters[$i];
        $array[$current_letter]["cantidad"] = number_of_letter($older_array, $current_letter);
        $array[$current_letter]["porcentaje"] = percentage($older_array, $current_letter);
    }
}

function pretty_print($key, $item, $index) {
    echo 
        '<div class="column"><span class="center">' . $index . '</span>' .
            '<div class="border column">"' . $key . '"' .  
                '<div class="row">' .
                    '<div class="column">' .
                        '<div class="border">Cant</div>' . 
                        '<div class="border">' . $item['cantidad'] . '</div>' . 
                    '</div>' . 
                    '<div class="column">' .
                        '<div class="border">Porc</div>' . 
                        '<div class="border">%' . round($item['porcentaje'], 2) . '</div>' . 
                    '</div>' . 
                '</div>' . 
            '</div>' . 
        '</div>';
}

function percentage(&$array, $letter): float {
    return (number_of_letter($array, $letter) * 100) / sizeof($array);
}

