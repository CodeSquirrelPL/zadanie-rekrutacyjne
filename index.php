<?php

class PhoneKeyboardConverter
{
    public function convertToNumeric(string $inputString): string
    {
        // we only accept english letters and spaces
        if (!preg_match('/^[a-zA-Z ]+$/', $inputString)) {
            throw new Exception('Unsupported string');
        }

        $inputLowercase = strtolower($inputString);
        $inputLowercaseArr = str_split($inputLowercase);
        $convertedArr = array_map('self::characterToKey', $inputLowercaseArr);

        return implode(',', $convertedArr);
    }

    public function convertToString(string $inputNumeric): string
    {
        if (!preg_match($this->numericValidationRegex, $inputNumeric)) {
            throw new Exception('Unsupported string');
        }
        $numbersArr = explode(',', $inputNumeric);
        $convertedArr = array_map(('self::keyToCharacter'), $numbersArr);

        return implode($convertedArr);
    }

    private function characterToKey(string $character): string
    {
        foreach(self::KEYPAD as $key => $characters) {
            $pressedTimes = array_search($character, $characters);
            if ($pressedTimes !== false) {
                return str_repeat($key, $pressedTimes + 1);
            }
        }

        throw new \Exception('This should not happen');
    }

    private function keyToCharacter(string $key): string
    {
        $presses = strlen($key);
        $pressedKey = $key[0];
        return self::KEYPAD[$pressedKey][$presses - 1];
    }

    private const KEYPAD = [
        '2' => ['a', 'b', 'c'],
        '3' => ['d', 'e', 'f'],
        '4' => ['g', 'h', 'i'],
        '5' => ['j', 'k', 'l'],
        '6' => ['m', 'n', 'o'],
        '7' => ['p', 'q', 'r', 's'],
        '8' => ['t', 'u', 'v'],
        '9' => ['w', 'x', 'y', 'z'],
        '0' => [' ']
    ];

    private string $numericValidationRegex;

    public function __construct()
    {
        $this->numericValidationRegex = $this->buildNumericValidationRegex();
    }

    private function buildNumericValidationRegex()
    {
    /* the regex is build dynamically because of its complexicity:
        - a section of the input string representing one character must contain only the same digit (it can be repeated)
        - the sections have to be divided by a comma
        - 1 is not accepted
        - 0 cannot appear more than once in a section
        - 7 and 9 can be repeated 1-4 times in a section
        - 2-6 and 8 can be repeated 1-3 times in a section */
        $digitRegex = [];
        foreach(self::KEYPAD as $key => $characters) {
            $digitRegex[] = sprintf('%s{1,%s}', $key, count($characters)); // eg. 2{1,3}
        }
        $digitRegex = '(' . implode('|', $digitRegex) . ')';

        return sprintf('/^(%s,)*%s$/', $digitRegex, $digitRegex);
    }
}

$test = new PhoneKeyboardConverter();

$result = $test->convertToNumeric('Ela nie ma kota');
echo $test->convertToNumeric('Ela nie ma kota') . PHP_EOL;
echo '33,555,2,0,66,444,33,0,6,2,0,55,666,8,2' . PHP_EOL;
echo $test->convertToString('5,2,22,555,33,222,9999,66,444,55') . PHP_EOL;
echo 'jablecznik' . PHP_EOL;