<?php

require_once 'EmpleadoTest.php';

class EmpleadoEventualTest extends EmpleadoTest 
{

 public function crear($nombre = "Hernán", $apellido = "Gobulin", $dni = 30112308, $salario = 10000, $fecha = null, Array $montos = [2000, 3000, 4000, 300])

    {
    $h = new \App\EmpleadoEventual($nombre, $apellido, $dni, $salario, $montos);
    return $h;
    }

    public function testSePuedePuedeCalcularLaComision()

    {
    $h= $this->crear("Hernán", "Gobulin", 30112308, 10000);
    $this->assertEquals(116.25, $h->calcularComision());
    }

    public function testSePuedeCalculaIngresoTotal()
    
    {
    $h= $this->crear("Hernán" , "Gobulin", 30112308, 10000);
    $this->assertEquals(10116.25, $h->calcularIngresoTotal());
    }

    public function testLanzaExcepcionConMontoCeroONegativo()

    {  
    $this->expectException(\Exception::class);
    $r= $this->crear("Hernán", "Gobulin", "30112308", "10000", null, [1000,-2000, 3500]);
    }

    
}