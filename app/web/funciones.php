<?php

global $letters;

function set_letters_array(int $array_size, bool $only_upper) {
    global $letters;
    $letters = [];
    for ($i = 0; $i < $array_size; $i++) {
        array_push($letters, random_letter($only_upper));
    }
}

function random_letter(bool $only_upper): string {
    $alphabet = "abcdefghigkmnlopqrstuvwxyz";
    $letter = $alphabet[rand(0, strlen($alphabet) - 1)];
    if (rand(0, 1) == 1 || $only_upper)
        $letter = strtoupper($letter);
    return $letter;
}

function letter_in_array(string $letter): bool {
    global $letters;
    foreach ($letters as $l) {
        if (!strcmp($l, $letter))
            return true;
    }
    return false;
}

function number_of_letter($letter): int {
    global $letters;
    $number = 0;
    foreach ($letters as $l) {
        if (!strcmp($l, $letter))
            $number += 1;
    }
    return $number;
}

function number_of_letter_in_array(array $array, string $letter): int {
    $number = 0;
    foreach ($array as $l) {
        if (!strcmp($l, $letter))
            $number += 1;
    }
    return $number;
}

function associative_array(&$array): array {
    return array_count_values($array);
}

function associative_array_with_percentage() {
    global $letters;
    $older_array = $letters;
    $letters = array_fill_keys($letters, ["cantidad"=>0, "porcentaje"=>0]);
    $keys = array_keys($letters);
    foreach ($keys as $k) {
        $letters[$k]["cantidad"] = number_of_letter_in_array($older_array, $k);
        $letters[$k]["porcentaje"] = percentage($older_array, $k);
    }
}

function pretty_print(string $key, $item, int $index) {
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

function percentage(array $array, string $letter): float {
    return (number_of_letter_in_array($array, $letter) * 100) / sizeof($array);
}

