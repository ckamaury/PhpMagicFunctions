<?php


namespace CkAmaury\PhpMagicFunctions;


class NumberUtils{

    static function getSuperior($a,$b){
        return ($a > $b) ? $a : $b;
    }

    static function getInferior($a,$b){
        return ($a < $b) ? $a : $b;
    }
}