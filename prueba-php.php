<?php

// 1 Ejercicio: 

$sellerId = 179571326;

define( "API_SELLER" , "https://api.mercadolibre.com/sites/MLA/search?seller_id=");
define( "API_CATEGORY" , "https://api.mercadolibre.com/categories/");

$json = file_get_contents(API_SELLER . $sellerId);
$res = json_decode($json);

$articulos = $res -> results;

foreach ($articulos as $data ) {
    $category = API_CATEGORY . $data->category_id;
    $jsonCategory = file_get_contents(API_CATEGORY . $data-> category_id);
    $catResults = json_decode($jsonCategory);

    $item = 'ID: "' . trim($data->id) . '" - Title: "' . trim($data-> title) . '"- Category: "' . trim($data->category_id) . '" - Name:"' . trim($catResults->name). '"' . PHP_EOL;

    file_put_contents('./log_' .date("j-n-Y"). '.log', $item, FILE_APPEND);
}
?>


<!-- 2 Ejercicio:  -->

<!-- SELECT  carrier.carrier_id, costos.Zona, Truncate( ((costos.precio * carrier.capacidad) * cantidadDeEnvios.cantidad_de_envios / carrier.capacidad), 0)
FROM costos, cantidadDeEnvios, carrier
WHERE carrier.carrier_id = costos.carrierid
AND costos.Zona = cantidadDeEnvios.zona -->



<!-- 3 Ejercicio:  -->

<!-- • Se busca Obtener un print por cada evento de trackeo donde muestran los datos de la sucursal, la fecha y la descripción. -->



<!-- 4 Ejercicio:  -->

<!-- • A mí entender se busca como output que se impriman los users_id y que se acceda a la API de mercadolibre y me traiga los servicios de dicho ID.

•   La 1° Línea es por defecto para bash.
    La 2° Declara la variable con los diferentes ID de cada usuario.
    La 3° Hace un for do para iterar cada usuario. 
    La 4° crea una variable curl donde se accede a la API de mercadolibre y dependiendo el ID cambia, aparte se accede a los servicios de dicha API.
    La 5° Realiza un echo por cada iteración que contiene el users_id y la variable de curl que muestra el servicio accedido con el id.

• Se imprimen 6 líneas. -->