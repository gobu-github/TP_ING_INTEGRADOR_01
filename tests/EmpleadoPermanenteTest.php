<?php

require_once 'EmpleadoTest.php';

class EmpleadoPermanenteTest extends EmpleadoTest 
{

    public function crear($nombre = "Hernán", $apellido = "Gobulin", $dni = 30112308, $salario = 10000, $fechaIngreso = null)

    {
    $h = new \App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, $fechaIngreso);
    return $h;
    }

    public function testRetornaFechaDeIngreso() 
    
    {
    $h = new DateTime('1983-11-03');
    $r = $this->crear("Jesica", "Vall", 123456, 1000, $h);
    $this->assertEquals('1983-11-03', $r->getfechaIngreso()->format("Y-m-d"));
    }

    
    public function testCalculaLaComisionRecibida() 
    
    {
    $fechaIngreso = new DateTime('1983-11-03');
    $h = $this->crear("Hernán", "Gobu", 1000, 10000, $fechaIngreso);
    $fechaActual = new DateTime();
    $antiguedad = $fechaActual->diff($fechaIngreso);
    $this->assertEquals($antiguedad->y, $h->calcularAntiguedad());
    $this->assertEquals("{$antiguedad->y}%", $h->calcularComision());
    } 
    
    public function testCalcularIngresoTotal() 
    
    {
       $antiguedad = 50;
       $h = $this->crear("Hernán", "Gobu", 1000, 10000 + $antiguedad);
       $this->assertEquals(10050, $h->calcularIngresoTotal());
    }


    public function testCalculaLaAntiguedad() 
    
    {
    $fechaIngreso = new DateTime('1983-11-03');
    $h = $this->crear("Hernán,", "Gobulin", 123456, 1000, $fechaIngreso);
    $fechaActual = new DateTime();
    $antiguedad = $fechaActual->diff($fechaIngreso);
    $this->assertEquals($antiguedad->y, $h->calcularAntiguedad());
    }
     
    public function testSinFechaIngresoRetornaFechadelDiaYAntiguedad0()
    
    {
    $fechaIngreso = new DateTime();
    $h = $this->crear("Hernán", "Gobu", 1000, 10000, $fechaIngreso);
    $fechaActual = new DateTime();
    $antiguedad = $fechaActual->diff($fechaIngreso);
    $this->assertEquals($antiguedad->y, $h->calcularAntiguedad());
    $this->assertEquals("0%", $h->calcularComision());
    }

    public function testCalculaAntiguedadConFechaPosteriorALaDeHoy()
     
    {
    $this->expectException(\Exception::class);
    $fechaIngreso = new DateTime('2030-10-15');
    $h = $this->crear("Hernán", "Gobu", 42214, 100, $fechaIngreso);
    $fechaActual = new DateTime();
    $antiguedad = $fechaActual->diff($fechaIngreso);
    }
 }