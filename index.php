<!DOCTYPE html>
<head>
    <script src="index.js"></script>
</head>


<?php

class PhoneKeyboardConverter {

    public $string = '';
    public $numeric = '';

    function convertToNumeric($input) {
        $output = "";
        $input = str_split($input);
         foreach ($input as $character) {
             $charNumber = ord($character)-91;
             $keyNumber = intdiv($charNumber, 3);
             for ($i = 0; $i<$charNumber%3+1; $i++) {
                $output.=$keyNumber;
             }
             $output.=",";
         }
         return $output;
     }


    function convertToString($input) {
        $output = "";
        //split the string according to the ,

        return $output;
    }

};


$test = new PhoneKeyboardConverter();
echo($test->convertToNumeric("cda"));
?>



Klawiatury starych telefonów komórkowych były wyłącznie numeryczne. Aby napisać za ich pomocą tekst należało naciskać dany klawisz numeryczny odpowiednią ilość razy, na przykład „ULA” zapisywało się jako 885552 (dwa naciśnięcia klawisza 8, trzy naciśnięcia klawisza 5, jedno naciśnięcia klawisza 2). Stwórz klasę PhoneKeyboardConverter zawierającą metody: 1. convertToNumeric, umożliwiającą tłumaczenie łańcucha znaków na ciąg numeryczny zgodny z klawiaturą telefonu, kolejne „litery” oddzielone powinny być przecinkiem, 2. convertToString , umożliwiającą tłumaczenie ciągu numerycznego zgodnego z klawiaturą telefonu (gdzie kolejne „litery” oddzielone będą przecinkiem) na tekst.
Metody powinny przyjmować jako wymagany parametr wejściowy ciąg znaków i zwracać przetłumaczony ciąg. Klasa może zawierać dowolne inne zmienne/metody, które zostały uznane za niezbędne bądź pomocne przy wykonaniu zadania.

<html>