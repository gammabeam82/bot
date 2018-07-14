<?php

namespace Gammabeam82\Bot\Utils;

class Utils
{
    /**
     * @param string $word
     *
     * @return string
     */
    public static function ucFirst(string $word): string
    {
        $firstChar = mb_strtoupper(mb_substr($word, 0, 1));

        return $firstChar . mb_substr($word, 1);
    }
}
