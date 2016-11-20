<?php

class ExcluirTransacaoTest extends PHPUnit_Framework_TestCase {
  protected function setUp()  {
    addtransacao(1);
    addtransacao(2);
    addtransacao(3);
    addtransacao(4);
    addtransacao(5);
    addtransacao(6);
    addtransacao(7);
    addtransacao(8);
  }

  protected function tearDown(){
    remove();
  }
  public function testTransacao0()  {
    $this->assertEquals(0, excluirTransacao([9]));
  }
  public function testTransacao1(){
    $this->assertEquals(1, excluirTransacao([1,2,3,4,5]));
  }
  public function testTransacao2()  {
    $this->assertEquals(0, excluirTransacao([6,6]));
  }
  public function testTransacao3(){
    $transacoes = ":u";
    $this->assertEquals(-1, excluirTransacao($transacoes));
  }
  public function testTransacao4(){
    $this->assertEquals(-1, excluirTransacao(null));
  }
  public function testTransacao5(){
    $this->assertEquals(-2,  excluirTransacao(["aaaah"]));
  }
}
