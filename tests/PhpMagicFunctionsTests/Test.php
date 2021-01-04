<?php

namespace CkAmaury\PhpMagicFunctionsTests;

use CkAmaury\PhpMagicFunctions\ArrayUtils;
use CkAmaury\PhpMagicFunctions\NumberUtils;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class Test extends TestCase{

    public function testBasicArray(){

        $array = [
            1,2,3,4,5,6
        ];

        Assert::assertSame(1,ArrayUtils::get_first($array));
        Assert::assertSame(6,ArrayUtils::get_last($array));
        Assert::assertSame(2,ArrayUtils::get(1,$array));
    }

    public function testArrayWithKeys(){

        $array = [
            'last' => "Hello",
            'first' => "World",
            'middle' => "!"
        ];

        Assert::assertSame("Hello",ArrayUtils::get_first($array));
        Assert::assertSame("!",ArrayUtils::get_last($array));
        Assert::assertSame("World",ArrayUtils::get('first',$array));

        ArrayUtils::replace_key('first','last',$array);
        Assert::assertCount(2,$array);
        Assert::assertSame("World",ArrayUtils::get('last',$array));

        ArrayUtils::replace_keys(['middle','last'],['last','first'],$array);
        Assert::assertCount(1,$array);

        $array = [
            'last' => "Hello",
            'first' => "World",
            'middle' => "!"
        ];


        ArrayUtils::change_keys(['first','middle','last'],$array);

        Assert::assertNotSame("Hello",ArrayUtils::get('first',$array));
        Assert::assertNotSame("World",ArrayUtils::get('middle',$array));
        Assert::assertNotSame("!",ArrayUtils::get('last',$array));

        $array = [
            'last' => "Hello",
            'first' => "World",
            'middle' => "!"
        ];

        ArrayUtils::change_keys(['first','middle','last'],$array,true);

        Assert::assertSame("Hello",ArrayUtils::get('first',$array));
        Assert::assertSame("World",ArrayUtils::get('middle',$array));
        Assert::assertSame("!",ArrayUtils::get('last',$array));

        $this->expectExceptionMessage("Array & New_Keys have not the same size.");
        ArrayUtils::change_keys(['plop'],$array);

    }

    public function testNumberUtils(){

        $a = 0;
        $b = 1;

        $c = NumberUtils::getSuperior($a,$b);
        Assert::assertEquals($b,$c);
        Assert::assertNotEquals($a,$c);

        $c = NumberUtils::getInferior($a,$b);
        Assert::assertEquals($a,$c);
        Assert::assertNotEquals($b,$c);

        $a = -15.89;
        $b = +28.97;

        $c = NumberUtils::getSuperior($a,$b);
        Assert::assertEquals($b,$c);
        Assert::assertNotEquals($a,$c);

        $c = NumberUtils::getInferior($a,$b);
        Assert::assertEquals($a,$c);
        Assert::assertNotEquals($b,$c);



    }
}
