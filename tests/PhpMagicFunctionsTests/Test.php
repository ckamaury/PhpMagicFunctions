<?php

namespace CkAmaury\PhpMagicFunctionsTests;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class Test extends TestCase{

    public function testBasicArray(){

        $array = [
            1,2,3,4,5,6
        ];

        Assert::assertSame(1,array_get_first($array));
        Assert::assertSame(6,array_get_last($array));
        Assert::assertSame(2,array_get(1,$array));
    }

    public function testArrayWithKeys(){

        $array = [
            'last' => "Hello",
            'first' => "World",
            'middle' => "!"
        ];

        Assert::assertSame("Hello",array_get_first($array));
        Assert::assertSame("!",array_get_last($array));
        Assert::assertSame("World",array_get('first',$array));

        array_replace_key('first','last',$array);
        Assert::assertCount(2,$array);
        Assert::assertSame("World",array_get('last',$array));

        array_replace_keys(['middle','last'],['last','first'],$array);
        Assert::assertCount(1,$array);

        $array = [
            'last' => "Hello",
            'first' => "World",
            'middle' => "!"
        ];


        array_change_keys(['first','middle','last'],$array);

        Assert::assertNotSame("Hello",array_get('first',$array));
        Assert::assertNotSame("World",array_get('middle',$array));
        Assert::assertNotSame("!",array_get('last',$array));

        $array = [
            'last' => "Hello",
            'first' => "World",
            'middle' => "!"
        ];

        array_change_keys(['first','middle','last'],$array,true);

        Assert::assertSame("Hello",array_get('first',$array));
        Assert::assertSame("World",array_get('middle',$array));
        Assert::assertSame("!",array_get('last',$array));

        $this->expectExceptionMessage("Array & New_Keys have not the same size.");
        array_change_keys(['plop'],$array);

    }
}
