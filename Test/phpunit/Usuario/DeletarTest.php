<?php

class DeletarTest extends PHPUnit_Framework_TestCase {
    public function testDeletaInvalido(){
        $this->assertEquals(-1, deleta(null));
    }
    public function testDeletaValido(){
        $this->assertEquals(1, deleta("valido"));
    }
}
?>
