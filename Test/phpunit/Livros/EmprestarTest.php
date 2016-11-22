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
    
    
    //ASSINATURA DA FUNCAO - emprestar($usuario, $emprestarUsuarios, $action)
    
    
    public function testEmprestar0(){
        $this->assertEquals(1, emprestar(1,["2'livro1","2'livro2"], "remover"));    //CORRETO - Todos os campos válidos
    }
    public function testEmprestar1(){
        $this->assertEquals(1, emprestar(1,["3'livro3"], "aceita"));                //CORRETO - Todos os campos validos
    }
    public function testEmprestar3(){
        $this->assertEquals(0, emprestar(3,["2'livro6","2'livro6"], "remover"));    //ERRO - Tentativa de remover solicitacao 2 vezes
    }
    public function testEmprestar4(){
        $this->assertEquals(-1, emprestar(2,["1'livro3"], "invalido"));             //ERRO - $action so pode ser "aceita" ou "remover"
    }
    public function testEmprestar5(){
        $this->assertEquals(0, emprestar(3,["2'livro6","2'livro6"], "remover"));    //ERRO - Tentativa de remover solicitacao 2 vezes
    }
    public function testEmprestar6(){
        $this->assertEquals(0, emprestar(3,["1'livro7"], "remover"));               //ERRO - Usuario 3 nao possui solicitacao para "livro7"
    }
    public function testEmprestar7(){
        $this->assertEquals(-1, emprestar("a",["2'livro6","2'livro6"], "remover")); //ERRO - ID do Usuario eh uma String ao inves de ser um numero
    }
    public function testEmprestar8(){
        $this->assertEquals(-1, emprestar(3,["2'livro6","2'livro6"], null));        //ERRO - $action nula 
    }
    public function testEmprestar9(){
        $this->assertEquals(-1, emprestar(3,1,"remover"));                         //ERRO - Numero ao inves de vetor de livros
    }
    public function testEmprestar10(){
        $this->assertEquals(-1, emprestar(3,["2'livro6","2'livro6"], 0));           //ERRO - $action numeral ao inves de String
    }
}
