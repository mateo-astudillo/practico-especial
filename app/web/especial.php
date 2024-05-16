<!DOCTYPE html>
<html>

<style>
    .border {
        border: 1px solid black;
        padding: 2px;
    }
    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 2px;
    }
    .column {
        display: flex;
        flex-direction: column;
    }
    .center {
        text-align: center;
    }
</style>

<h1>Práctico Especial</h1>
<h2>Mateo Astudillo</h2>

<?php include 'funciones.php'; ?>

<!-- size -->
<div>Parámetros por defecto:
    <ul>
        <li>array_size = 100</li>
        <li>letter = A</li>
        <li>only_upper = false</li>
    </ul>
</div>

<!-- size -->
<div>Tamaño del arreglo:
    <br>
    <?php
    $array_size = 100;
    if (array_key_exists("array_size", $_GET))
        $array_size = $_GET['array_size'];
    echo $array_size;
    ?>
</div>
<br>

<!-- array -->
<div>
    Arreglo:
    <br>
    <?php
    $only_upper = false;
    if (array_key_exists("only_upper", $_GET))
        $only_upper = json_decode($_GET['only_upper']);
    set_letters_array($array_size, $only_upper);
    echo implode(' ', $letters);
    ?>
</div>
<br>

<!-- search letter-->
<div>
    ¿Está la letra
    <?php
    $letter = "A";
    if (array_key_exists("letter", $_GET))
        $letter = $_GET['letter'];
    echo '"' . $letter . '"?';
    ?>
    <br>
    <?php
    if (letter_in_array($letter)) {
        echo "Sí está";
    } else {
        echo "No está";
    }
    ?>
</div>
<br>

<!-- count letters -->
<div>
    ¿Cuántas veces está la letra
    <?php
        echo '"' . $letter . '"?';
    ?>
    <br>
    <?php
        echo number_of_letter($letter);
    ?>
</div>
<br>

<!-- associative array -->
<div>
    Arreglo asociativo
    <br>
    <?php
    print_r(associative_array($letters));
    ?>
</div>
<br>

<!-- associative array with percentage -->
<div>
    Arreglo asociativo con cantidad y porcentaje
    <br>
    <div class="row">
    <?php
    associative_array_with_percentage($letters);
    array_map('pretty_print', array_keys($letters), $letters, array_keys(array_keys($letters)));
    ?>
    </div>
</div>
</html>
