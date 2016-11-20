<?php

class ExcluirTest extends PHPUnit_Framework_TestCase {
  protected function setUp(){
      adcionarLivro(1,"livro1");
      adcionarLivro(1,"livro2");
      adcionarLivro(1,"livro3");
      adcionarLivro(2,"kamasutra");
  }

  protected function tearDown(){
      limpa();
  }
  public function testExcluir0(){
      $this->assertEquals(1, excluir(1,["livro1"]));
  }
  public function testExcluir1(){
      $this->assertEquals(0, excluir(1,["kamasutra"]));
  }
  public function testExcluir3(){
      $this->assertEquals(0, excluir(1,["livro2","livro3","livro2"]));
  }
  public function testExcluir4(){
      $this->assertEquals(-1, excluir(2, null));
  }
  public function testExcluir5(){
      $this->assertEquals(-1, excluir(1,2));
  }

}
