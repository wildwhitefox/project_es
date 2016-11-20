<?php

class AutenticaTest extends PHPUnit_Framework_TestCase {
    protected function setUp(){
          addUsuario("valido", "valido","valido","valido@valido.com",36660666);
    }

    protected function tearDown(){
        remove();
    }
    public function testLogin0(){
        $this->assertEquals(0, autentica(null, null));
     }
     public function testLogin1(){
        $this->assertEquals(1, autentica("admin","admin"));
    }
    public function testLogin2(){
        $this->assertEquals(2, autentica("valido","valido"));
    }
    public function testLogin3(){
        $this->assertEquals(-1, autentica("'","'"));
    }
    public function testLogin4(){
        $this->assertEquals(-2, autentica(" ",null));
    }
    public function testLogin5(){
        $this->assertEquals(-3, autentica("n�o valido"," "));
    }
    public function testLogin6(){
        $this->assertEquals(-4, autentica("valido","n�o valido"));
    }


}
