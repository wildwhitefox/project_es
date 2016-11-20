<?php

class PedirEmprestadoTest extends PHPUnit_Framework_TestCase {
  protected function setUp(){
    adicionarEmprestimo(1, 2,"best livro");
  }

  protected function tearDown(){
      limpa();
  }
  public function testPedirEmprestado0(){
      $this->assertEquals(1, pedirEmprestado(1, 2, ["worst livro"]));
  }
  public function testPedirEmprestado1(){
      $this->assertEquals(0, pedirEmprestado(1, 2, ["best livro"]));
  }
  public function testPedirEmprestado3(){
      $this->assertEquals(-1, pedirEmprestado(1, 2, null));
  }
  public function testPedirEmprestado4(){
     $this->assertEquals(-1, pedirEmprestado(null, 2, ["best livro"]));
  }
}
