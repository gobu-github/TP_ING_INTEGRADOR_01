<?php 

abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase {
 

    public function testArrojaNombreApellido()
    {
        $h = $this->crear("Hernán", "Gobulin");
        $this->assertEquals("Hernán Gobulin", $h->getNombreApellido());
    }

    public function testNoArrojaNombreCuandoEstaVacio()
    {
        $this->expectException(\Exception::class);
        $h = $this->crear("", "Gobulin");
    }

    public function testNoArrojaApellidoCuandoEstaVacio()
    {
        $this->expectException(\Exception::class);
        $h = $this->crear("Hernán" , "");
    }
    public function testArrojaDNI()
    {
        $h = $this->crear(30112308);
        $this->assertEquals(30112308, $h->getDNI());
    }

    public function testNoArrojaDNICuandoEstaVacio()
    {
        $this->expectException(\Exception::class);
        $h = $this->crear("Hernán", "Gobulin", null, 10000);
    }

    public function testNoArrojaDNICuandoExisteUnaLetra()
    {
        $this->expectException(\Exception::class);
        $h = $this->crear("Hernán", "Gobulin", "h", 10000);
    }
    
    public function testArrojaSalario()
    {
        $h = $this->crear(10000);
        $this->assertEquals(10000, $h->getSalario());
    }

    public function testNoArrojaSalario()
    {
        $this->expectException(\Exception::class);
        $h = $this->crear("Hernan", "Gobulin", 10000, null);
    }
    
    public function testObtieneYSeleccionaSector() 
    {
    $h = $this->crear("Hernán", "Gobulin", 10000, 10000, null);
    $h->setSector("Permanente");
    $this->assertEquals("Permanente",$h->getSector()); 
    }
    
    public function testNoSeSeleccionaElSector() 
    {
    $h = $this->crear("Hernán", "Gobulin", 10000, 10000, null);
    $this->assertEquals("No especificado",$h->getSector()); 
    }

    public function test__toString()
    {
      $h = $this->crear("Hernán", "Gobulin", 110383, 10000);
      $this->assertEquals("Hernán Gobulin 110383 10000", $h->__toString());
    }   
}