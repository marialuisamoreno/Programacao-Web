<?php
    $largura = $_GET['largura'];
    $comprimento = $_GET['comprimento'];
    $area = (int)$largura*(int)$comprimento;
    $alunos = $area/2.25;
    $alunos = (int)$alunos;
    echo "Em uma area de ".$area." metros quadrados, apenas ".$alunos." podem ficar nessa sala.";
?>