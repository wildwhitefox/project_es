<?php

class ExcluirUsarioTest extends PHPUnit_Framework_TestCase {
  protected function setUp(){
      addUsuario("valido1", "validinson","valido","valido1@valido.com",36660666);
      addUsuario("valido2", "valido","valido","valido2@valido.com",36660667);
      addUsuario("valido3", "validolly","valido","valido3@valido.com",36660668);
  }

  protected function tearDown(){
      remove();
  }
  public function testExcluirUsario0()  {
      $this->assertEquals(0, excluirUsario(["inexistente"]));
  }
  public function testExcluirUsario1(){
      $this->assertEquals(1, excluirUsario(["valido1","valido2"]));
  }
  public function testExcluirUsario3()
  {
      $this->assertEquals(-1, excluirUsario("hue"));
  }
  public function testExcluirUsario4()
  {
      $this->assertEquals(-2, excluirUsario([1]));
  }

  public function testExcluirUsario5()
  {
      $this->assertEquals(-1, excluirUsario(null));
  }

}
