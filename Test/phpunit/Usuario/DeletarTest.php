<?php

class DeletarTest extends PHPUnit_Framework_TestCase {
    protected function setUp()
          addUsuario("valido", "valido  jacinto","senhasupervalidaesegura","valido@valido.com",36660666);

    protected function tearDown(){
        remove();
    }
    public function testDeletaInvalido(){
        $this->assertEquals(-1, deleta(null));
    }
    public function testDeletaValido(){
        $this->assertEquals(1, deleta("valido"));
    }
}
?>
