<!DOCTYPE html>
<head>
    <script src="index.js"></script>
</head>


<?php

class PhoneKeyboardConverter {

    public $string = '';
    public $numeric = '';

    public $keypad = [
        '2' => ['a', 'b', 'c'],
        '3' => ['d', 'e', 'f'],
        '4' => ['g', 'h', 'i'],
        '5' => ['j', 'k', 'l'],
        '6' => ['m', 'n', 'o'],
        '7' => ['p', 'q', 'r', 's'],
        '8' => ['t', 'u', 'v'],
        '9' => ['w', 'x', 'y', 'z']
    ];

    function find($character) {
        foreach($this->keypad as $index => $key) {
            $pushes = array_search($character, $key);
            if ($pushes) return [$index, $pushes + 1];
        }
        return false;
    }

    function convertToNumeric($input) {
        $output = "";
        $input = str_split($input);
        foreach ($input as $character) {
            //znaki diakrytyczne - zamień na zwykłe; ->lowercase
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
        $numbers = explode(",", $input);
        foreach ($numbers as $character) {
            //czy wszystkie cyfry są takie same, czy są wyłącznie cyfry?, czy jest ich >0 i <4 -> error: incorrect input
            $pushes = strlen($character);
            $keyNumber = $character[0]; //można zrobić w walidacji
            $charNumber = $keyNumber*3+90+$pushes;
            //$output.=chr($charNumber);
            //$output.=$charNumber;
            //$output.=",";
            $output=$output.'pushes: '.$pushes.' pressed key: '.$keyNumber.' character number: '.$charNumber.' character: '.chr($charNumber).'<br>';
        }
        return $output;
    }

    function validateKeyNumber($KeyNumberArr) {
        $keyNumber = array_values($KeyNumberArr);
        if ($keyNumber) {
            
        } 
    }

};




$test = new PhoneKeyboardConverter();
//echo($test->convertToString("5,2,22,555,33,222,9999,66,444,55"));
echo(implode(',', $test->find('ź')));
?>



Klawiatury starych telefonów komórkowych były wyłącznie numeryczne. Aby napisać za ich pomocą tekst należało naciskać dany klawisz numeryczny odpowiednią ilość razy, na przykład „ULA” zapisywało się jako 885552 (dwa naciśnięcia klawisza 8, trzy naciśnięcia klawisza 5, jedno naciśnięcia klawisza 2). Stwórz klasę PhoneKeyboardConverter zawierającą metody: 1. convertToNumeric, umożliwiającą tłumaczenie łańcucha znaków na ciąg numeryczny zgodny z klawiaturą telefonu, kolejne „litery” oddzielone powinny być przecinkiem, 2. convertToString , umożliwiającą tłumaczenie ciągu numerycznego zgodnego z klawiaturą telefonu (gdzie kolejne „litery” oddzielone będą przecinkiem) na tekst.
Metody powinny przyjmować jako wymagany parametr wejściowy ciąg znaków i zwracać przetłumaczony ciąg. Klasa może zawierać dowolne inne zmienne/metody, które zostały uznane za niezbędne bądź pomocne przy wykonaniu zadania.

<html>