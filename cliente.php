<?php

$options = array(
    'location' => 'http://localhost/webservices/appwebservices/server.php',
    'uri' => 'http://localhost/webservices/appwebservices/'
);

$client = new SoapClient (NULL, $options);

$nombre = "Vidal Obando";

echo $client->saludar ($nombre. '!!'). "</br>";

echo "El resultado de la suma es: " . $client->operacion(10, 5, 'suma'). "</br>";
echo "El resultado de la resta es: " . $client->operacion(10, 5, 'resta'). "</br>";
echo "El resultado de la multiplicación es: " . $client->operacion(10, 5, 'multiplicacion'). "</br>";
echo "El resultado de la división es: " . $client->operacion(10, 5, 'division'). "</br>";

?>
