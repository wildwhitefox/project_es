<?php

class CadastrarLivroTest extends PHPUnit_Framework_TestCase {
  protected function setUp(){
  }

  protected function tearDown(){
      limpa();
  }
  public function testCadastrarLivror0(){
      $this->assertEquals(1, cadastrarLivro(1, "livro1", 3, "abril", "pessoa", "ficção"));
  }
  public function testCadastrarLivro1(){
      $titulo =null;
      $this->assertEquals(-1,  cadastrarLivro(1, $titulo, 3, "abril", "pessoa", "ficção"));
  }
  public function testCadastrarLivro3(){
      $this->assertEquals(-2, cadastrarLivro(1, "livro2''", 3, "abri'l", "pessoa'", "fi'cção"));
  }
  public function testCadastrarLivro4(){
      $this->assertEquals(-3, cadastrarLivro(1,"livro2","n numero", "abril", "pessoa", "ficção"));
  }
  public function testCadastrarLivror5(){
      cadastrarLivro(1, "livro2", 3, "abril", "pessoa", "ficção");
      cadastrarLivro(1, "livro3", 3, "abril", "pessoa", "ficção");
      cadastrarLivro(1, "livro4", 3, "abril", "pessoa", "ficção");
      cadastrarLivro(1, "livro5", 3, "abril", "pessoa", "ficção");
      cadastrarLivro(1, "livro6", 3, "abril", "pessoa", "ficção");
      cadastrarLivro(1, "livro7", 3, "abril", "pessoa", "ficção");
      cadastrarLivro(1, "livro8", 3, "abril", "pessoa", "ficção");
      cadastrarLivro(1, "livro9", 3, "abril", "pessoa", "ficção");
      cadastrarLivro(1, "livro10", 3, "abril", "pessoa", "ficção");
      $this->assertEquals(0, cadastrarLivro(1, "livro11", 3, "abril", "pessoa", "ficção"));
  }

}
