<?php

interface A{
    public function test1();
}

interface B{
    public function test2();
}

interface C extends A,B{
    public function test3();
    public function test1();
}

class Test implements C {
    public function test1(){
        echo "Lancement test1 <br/>";
    }

    public function test2(){
        echo "Lancement test2 <br/>";
    }

    public function test3(){
        echo "Lancement test3 <br/>";
    }
}

$test = new Test;
$test->test1();
$test->test2();
$test->test3();

