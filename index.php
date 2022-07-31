<!DOCTYPE html>
<head>
    <script src="index.js"></script>
</head>

<?php
class PhoneKeyboardConverter {

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

    function whichKey($character) {
        foreach($this->keypad as $index => $key) {
            $pressedTimes = array_search($character, $key);
            if ($pressedTimes!==false) {
                $output = "";
                $pressedTimes+=1;
                for ($i=0; $i<$pressedTimes; $i++) {
                    $output.=$index;
                }
                return $output;
            }
        }
        return false;
    }

    function whichCharacter($number) {
        $presses = strlen($number);
        $pressedKey = $number[0];
        return $this->keypad[$pressedKey][$presses-1];
    }

    function convertToNumeric($input) {
        $output = "";
        $inputLowercase = strtolower($input);
        $inputLowercaseArr = str_split($inputLowercase);
        foreach ($inputLowercaseArr as $character) {
            echo($this->whichKey($character));
         }
         return $output;
     }


    function convertToString($input) {
        $output = "";
        $numbers = explode(",", $input);
        foreach ($numbers as $keyPressed) {
            $output.=$this->whichCharacter($keyPressed);
        }
        return $output;
    }
};




$test = new PhoneKeyboardConverter();
//echo($test->convertToString("55,222"));
$test->convertToNumeric('e');
?>

<html>

Klawiatury starych telefonów komórkowych były wyłącznie numeryczne. Aby napisać za ich pomocą tekst należało naciskać dany klawisz numeryczny odpowiednią ilość razy, na przykład „ULA” zapisywało się jako 885552 (dwa naciśnięcia klawisza 8, trzy naciśnięcia klawisza 5, jedno naciśnięcia klawisza 2). Stwórz klasę PhoneKeyboardConverter zawierającą metody: 1. convertToNumeric, umożliwiającą tłumaczenie łańcucha znaków na ciąg numeryczny zgodny z klawiaturą telefonu, kolejne „litery” oddzielone powinny być przecinkiem, 2. convertToString , umożliwiającą tłumaczenie ciągu numerycznego zgodnego z klawiaturą telefonu (gdzie kolejne „litery” oddzielone będą przecinkiem) na tekst.
Metody powinny przyjmować jako wymagany parametr wejściowy ciąg znaków i zwracać przetłumaczony ciąg. Klasa może zawierać dowolne inne zmienne/metody, które zostały uznane za niezbędne bądź pomocne przy wykonaniu zadania.