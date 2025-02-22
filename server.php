<?php

require('conexion.php');

class serverSoap extends Conexion
{
    public function saludar ($name)
    {
        return 'Hola, '.$name.'!';
    }

    public function operacion($num1, $num2, $operador)
    {
        switch ($operador) {
            case 'suma':
                return $num1 + $num2;
            case 'resta':
                return $num1 - $num2;
            case 'multiplicacion':
                return $num1 * $num2;
            case 'division':
                return ($num2 != 0) ? $num1 / $num2 : 'División por cero no permitida';
            default:
                return 'Operador no válido';
        }
    }
}

// Crear un nuevo servidor SOAP
$options = array('uri' => 'http://localhost/webservices/appwebservices/');

// Instanciar el servidor SOAP
$server = new SoapServer (NULL, $options);

// Configurar qué clase manejará las solicitudes SOAP
$server->setClass('serverSoap');

// Procesar las solicitudes SOAP
$server->handle ();

?>
