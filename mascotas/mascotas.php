<?php

try {
    $query = filter_input(INPUT_GET, "query");    
    if (is_null($query)) {
        throw new exception("El parámetro query no puede ser nulo.");
    }    
    // Se recibe el valor de la variable query que se envía por GET para que regrese la lista de coincidencias

    $archivo = fopen("mascotas.dat","r");

    $nombres_string = fread($archivo, filesize("mascotas.dat"));

    $nombres_array = explode(PHP_EOL,$nombres_string);

    $nombres_filtrados = [];

    
    
    foreach($nombres_array as $nombre) {

    
        
        if (str_starts_with($nombre,$query)) {            
            array_push($nombres_filtrados,$nombre);
        }

        if (sizeof($nombres_filtrados) >= 10) {
            break;
        }
    }    
    echo json_encode($nombres_filtrados);
} catch (Exception $e) {
    echo $e->getMessage();
}




