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

    public function getProduct() 
    {
        $query = "SELECT * FROM producto";
        $result = mysqli_query($this->db, $query);
        
        while ($row = mysqli_fetch_assoc($result))
        {
            return $row['nombre'];
        }
        $result->close();
    }

    public function validarUsuario($usuario, $clave)
    {
        $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
        $result = mysqli_query($this->db, $query);
        
        if (mysqli_num_rows($result) > 0) 
        {
            return "Los datos ingresados son válidos";
        } 
        else 
        {
            return "Los datos ingresados no coinciden, intente de nuevo";
        }
    }
}

// Crear un nuevo servidor SOAP
$options = array('uri' => 'http://localhost/webservices/appwebservices/');

// Instanciar el servidor SOAP
$server = new SoapServer(NULL, $options);

// Configurar qué clase manejará las solicitudes SOAP
$server->setClass('serverSoap');

// Procesar las solicitudes SOAP
$server->handle();
?>
