<?php

class RemoverDaListaTest extends PHPUnit_Framework_TestCase {
  protected function setUp(){
      adicionarDevolucao(1, 2,"algum livro");
      adicionarDevolucao(1, 3,"outro livro");
  }

  protected function tearDown(){
      limpa();
  }
  public function testRemoverDaLista0(){
      $this->assertEquals(1, removerDaLista(1,["2'algum livro"]));
  }
  public function testRemoverDaLista1(){
      $this->assertEquals(-1,  removerDaLista(1,null));
  }
  public function testRemoverDaLista3(){
      $this->assertEquals(-1,  removerDaLista(null,["2'algum livro"]));
  }
  public function testRemoverDaLista4(){
      $this->assertEquals(0, removerDaLista(1,["4'livro?"]));
  }
  public function testRemoverDaLista5(){
      $this->assertEquals(-1, excluir(1,2));
  }

}
