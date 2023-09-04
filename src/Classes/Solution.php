<?php

namespace App;

class Solution
{
    public function isValid($s) : bool
    {
        $arBraces = [
            '(' => ')',
            '{' => '}',
            '[' => ']'
        ];
        for ($i = 0; $i < strlen($s); $i++) {
            if (in_array($s[$i], array_keys($arBraces))) {
                if (!str_contains($s, $arBraces[$s[$i]])) {
                    return false;
                }
            }
        }
        return true;
    }
}