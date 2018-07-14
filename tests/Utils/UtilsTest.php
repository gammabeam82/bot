<?php

namespace Tests\Utils;

use Gammabeam82\Bot\Utils\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    public function testUcFirst()
    {
        $word = Utils::ucFirst("тест");

        $this->assertTrue(is_string($word));
        $this->assertEquals("Тест", $word);
    }
}
