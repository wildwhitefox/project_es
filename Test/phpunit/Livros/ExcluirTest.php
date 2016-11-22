<?php

class ExcluirTest extends PHPUnit_Framework_TestCase {
    protected function setUp(){
        adcionarLivro(1, "livro1");
        adcionarLivro(1, "livro2");
        adcionarLivro(1, "livro3");
        adcionarLivro(2, "guiness");
    }
    protected function tearDown(){
        limpa();
    }
    
    
    //ASSINATURA DA FUNCAO - excluir($usuario, $livrosPedidos)
    
    
    public function testExcluir0(){
        $this->assertEquals(1, excluir(1,["livro1"]));                    //CORRETO - Livro ja inserido
    }
    public function testExcluir1(){
        $this->assertEquals(0, excluir(1,["guiness"]));                   //ERRO - Livro nao inserido
    }
    public function testExcluir3(){
        $this->assertEquals(0, excluir(1,["livro2","livro3","livro2"]));  //ERRO - Livros nao inseridos
    }
    public function testExcluir4(){
        $this->assertEquals(-1, excluir(2, null));                        //ERRO - Titulo nulo do livro
    }
    public function testExcluir5(){
        $this->assertEquals(-1, excluir(1,2));                            //ERRO - Titulo eh um numero e nao uma String
    }
}
