<?php
    $ladoA = $_GET['ladoA'];
    $ladoB = $_GET['ladoB'];
    $ladoC = $_GET['ladoC'];

    $ladoA = (int)$ladoA;
    $ladoB = (int)$ladoB;
    $ladoC = (int)$ladoC;

    if((($ladoA + $ladoB) < $ladoC) || (($ladoA + $ladoC) < $ladoB) || (($ladoB + $ladoC) < $ladoA)){
        if ($ladoA == $ladoB && $ladoBb == $ladoC) echo "Triangulo equilatero.";
        elseif ($ladoA == $ladoB || $ladoA == $ladoC || $ladoB == $ladoC) echo "Triangulo isosceles.";
        else echo "Triangulo escaleno.";
    }
    else echo "O triangulo não existe.";
?>