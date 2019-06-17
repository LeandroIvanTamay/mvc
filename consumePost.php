<?php

include('./httpful.phar');

$url = "http://localhost/api.peopleapp.com/v1/usuarios/registro";

$contenido = json_encode(array(
        "nombre" => "jose",
        "contrasena" =>"87654",
        "correo"=>"jose@gmail.com"
    )
);

$response = \Httpful\Request::post($url)
->sendsJson()
->body($contenido)
->addHeader('authorization', 'cfd692e7e245a72b54747a05e48b07a9')
->send();

echo "respuesta: <br>";
echo $response;

if ($response->hasBody()){
        echo $response->raw_body;        
    }  

?>
