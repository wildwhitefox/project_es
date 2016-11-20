<?php

class DeletarSolicitacoesTest extends PHPUnit_Framework_TestCase {
  protected function setUp(){
      pedir(1,"livro1",2);
      pedir(1,"livro2",2);
      pedir(1,"livro3",3);
      pedir(2,"livro4",1);
      pedir(2,"livro5",3);
      pedir(3,"livro6",2);
  }

  protected function tearDown(){
      limpa();
  }
  public function testDeletarSolicitacoes0(){
      $this->assertEquals(1, deletarSolicitacoes(1, ["livro1","livro2"]));
      $this->assertEquals(1, deletarSolicitacoes(1, ["livro3"]));
  }
  public function testDeletarSolicitacoes1(){
      $this->assertEquals(0, deletarSolicitacoes(1, ["livro3", "livro3"]));
  }
  public function testDeletarSolicitacoes3(){
      $this->assertEquals(0, deletarSolicitacoes(2,["livro2","livro3"]));
  }
  public function testDeletarSolicitacoes4(){
      $this->assertEquals(-1, deletarSolicitacoes(1, null));
  }

}
