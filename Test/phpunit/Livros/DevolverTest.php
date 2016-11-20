<?php

class DevolverTest extends PHPUnit_Framework_TestCase {
  protected function setUp(){
      adicionarEmprestimo(1, 2,"livro1");
      adicionarEmprestimo(3, 2,"livro2");
      adicionarEmprestimo(4, 2,"livro3");
      adicionarEmprestimo(5, 2,"livro4");
  }

  protected function tearDown(){
      limpa();
  }
  public function testDevolver0(){
      $this->assertEquals(1,  devolver(2, ["livro1"]));
      $this->assertEquals(1,  devolver(2, ["livro2", "livro3"]));
  }
  public function testDevolver1(){
      $this->assertEquals(0, devolver(2, ["livro4", "livro3"]));
  }
  public function testDevolver3(){
      $this->assertEquals(0, devolver(2,["livro4","livro2","livro3","livro4"]));
  }
  public function testDevolver4(){
      $this->assertEquals(-1, devolver(2, null));
  }

}
