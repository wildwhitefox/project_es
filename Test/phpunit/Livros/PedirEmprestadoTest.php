<?php

class PedirEmprestadoTest extends PHPUnit_Framework_TestCase {
    protected function setUp(){
        adicionarEmprestimo(1, 2,"best livro");
    }
    protected function tearDown(){
        limpa();
    }
    
    
    //ASSINATURA DA FUNCAO - pedirEmprestado($usuario, $pedinte, $livrosPedidos)
    
    
    public function testPedirEmprestado0(){
        $this->assertEquals(1, pedirEmprestado(1, 2, ["worst livro"]));     //CORRETO - "worst livro" ainda nao foi emprestado
    }
    public function testPedirEmprestado1(){
        $this->assertEquals(0, pedirEmprestado(1, 2, ["best livro"]));      //ERRO - "best livro" ja foi emprestado
    }
    public function testPedirEmprestado3(){
        $this->assertEquals(-1, pedirEmprestado(1, 2, null));               //ERRO - Livro Nulo
    }
    public function testPedirEmprestado4(){
        $this->assertEquals(-1, pedirEmprestado(null, 2, ["best livro"]));  //ERRO - Proprietario do livro nulo
    }
}
