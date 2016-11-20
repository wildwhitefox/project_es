<?php

class CriarContaTest extends PHPUnit_Framework_TestCase {

    protected function setUp(){
          addUsuario("usado", "usado da silva","anysenha","usado@fake.com",36660666);
    }

    protected function tearDown(){
        remove();
    }

    public function testLogin0(){
        $this->assertEquals(1, check("eu","valid@test.com","eu",822738,"such a nice senha","such a nice senha") );
    }
    public function testLoginEmailUsado(){
        $this->assertEquals(-4, check("eu","usado@fake.com","eu",822738,"such a nice senha","such a nice senha") );
    }
    public function testLoginUserUsado(){
        $this->assertEquals(-5, check("eu","eu","usado",822738,"such a nice senha","such a nice senha") );
    }
    public function testLoginTelefoneLetra(){
        $this->assertEquals(-1, check("eu","eu","eu","a","such a nice senha","such a nice senha") );
    }
    public function testLogin4(){
        $this->assertEquals(-3, check(null,"eu","eu",822738,"such a nice senha","such a nice senha") );
    }
    public function testLogin5(){
        $this->assertEquals(-2, check("eu","eu","eu",822738,"such a nice senha","such a bad senha :o") );
    }

}
