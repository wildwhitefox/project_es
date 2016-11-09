<?php

class CriarContaTest extends PHPUnit_Framework_TestCase
{

    public function testLogin0()
    {
        $this->assertEquals(1, check("eu","eu","eu",822738,"such a nice senha","such a nice senha") );
     }
public function testLoginEmailUsado()
    {
        $this->assertEquals(-4, check("eu","valido@fake.com","eu",822738,"such a nice senha","such a nice senha") );
    }
public function testLoginUserUsado()
    {
        $this->assertEquals(-5, check("eu","eu","valido",822738,"such a nice senha","such a nice senha") );
    }
public function testLoginTelefoneLetra()
    {
        $this->assertEquals(-1, check("eu","eu","eu","a","such a nice senha","such a nice senha") );
    }
public function testLogin4()
    {
        $this->assertEquals(-3, check(null,"eu","eu",822738,"such a nice senha","such a nice senha") );
    }
public function testLogin5()
    {
        $this->assertEquals(-2, check("eu","eu","eu",822738,"such a nice senha","such a bad senha :o") );
    }

}