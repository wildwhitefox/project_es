<?php

class EmprestarTest extends PHPUnit_Framework_TestCase {
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
  public function testEmprestar0(){
      $this->assertEquals(1, emprestar(1,["2'livro1","2'livro2"], "remover"));
  }
  public function testEmprestar1(){
      $this->assertEquals(1, emprestar(1,["3'livro3"], "aceita"));
  }
  public function testEmprestar3(){
      $this->assertEquals(0, emprestar(3,["2'livro6","2'livro6"], "remover"));
  }
  public function testEmprestar4(){
      $this->assertEquals(-1, emprestar(2,["1'livro3"], "invalido"));
  }
  public function testEmprestar5(){
      $this->assertEquals(0, emprestar(3,["2'livro6","2'livro6"], "remover"));
  }
  public function testEmprestar6(){
      $this->assertEquals(0, emprestar(3,["1'livro7"], "remover"));
  }
  public function testEmprestar7(){
      $this->assertEquals(-1, emprestar("a",["2'livro6","2'livro6"], "remove"));
  }
  public function testEmprestar8(){
      $this->assertEquals(-1, emprestar(3,["2'livro6","2'livro6"], null));
  }
  public function testEmprestar9(){
      $this->assertEquals(-1, emprestar(3,1, "remove"));
  }
  public function testEmprestar10(){
      $this->assertEquals(0, emprestar(3,["2'livro6","2'livro6"], 0));
  }

}
