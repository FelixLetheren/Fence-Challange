<?php
require '../index.php';

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    public function testgetMaxLength_givesCorrectLength()
    {

        $expectedResult = 27.3;

        $result = getMaxLength(17, 30);

        $this->assertEquals($expectedResult, $result);
    }

    public function testaddPostAndRailingLength_calculatesCorrectly()
    {
        $expectedResult = 8.1;

        $result = addPostandRailingLength(6, 5);

        $this->assertEquals($expectedResult, $result);

    }



}
