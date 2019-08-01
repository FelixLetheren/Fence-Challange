<?php
require '../functions.php';

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    public function testgetMaxLength_givesCorrectLength()
    {

        $expectedResult = 27.3;

        $result = getMaxLength(17, 30);

        $this->assertEquals($expectedResult, $result);
    }
    public function testGetMaxLength_returnsADouble(){

        $expectedResult = 'double';

        $result = gettype(getMaxLength(20,17));

        $this->assertEquals($expectedResult, $result);
    }

    public function testaddPostAndRailingLength_calculatesCorrectly()
    {
        $expectedResult = 8.1;

        $result = addPostandRailingLength(6, 5);

        $this->assertEquals($expectedResult, $result);
    }
    public function testCheckInput_stopsNegativeValues(){

        $expectedResult = false;

        $result = checkInput(-10);

        $this->assertEquals($expectedResult, $result);
    }
    public function testCalculatePossibleFenceLength_calculatesCorrectly(){
        $expectedPostsResult = 20;
        $expectedRailingsResult = 19;

        $result = calculatePossibleFenceLength(30);

        $this->assertEquals($result['posts'], $expectedPostsResult);
        $this->assertEquals($result['railings'], $expectedRailingsResult);
    }



}
