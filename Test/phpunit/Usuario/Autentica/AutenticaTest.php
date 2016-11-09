<?php

class AutenticaTest extends PHPUnit_Framework_TestCase
{

    public function testLogin()
    {
        $this->assertEquals(0, autentica(null, null));
        $this->assertEquals(1, autentica("admin","admin"));
        $this->assertEquals(2, autentica("valido","valido"));
        $this->assertEquals(-1, autentica("'","'"));
        $this->assertEquals(-2, autentica(" ",null));
        $this->assertEquals(-3, autentica("não valido"," "));
        $this->assertEquals(-4, autentica("valido","não valido"));
    }

}