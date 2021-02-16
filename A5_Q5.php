<?php
    function fibonacci($n) {
        $a = 0;
        $b = 1;
        $c = 1;
        for ($i = 1; $i < $n ; $i++) { 
            $c = $a + $b;
            $a = $b;
            $b = $c;
        }
        return $c;
    }
    echo "O 10o termo de Fibonacci eh ".fibonacci(10).".";
?>