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

    
      
 }