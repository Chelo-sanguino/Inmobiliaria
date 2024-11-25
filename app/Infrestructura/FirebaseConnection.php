<?php

namespace App\Infraestructura;

use Firebase\FirebaseLib;

class FirebaseConnection
{
    const URL = 'https://inmobiliaria-6eba3-default-rtdb.firebaseio.com/';
    const TOKEN = 'MTCuY5sWPIoRQKdAcXkdODMZ7N86lUBW2XHQvFk6';

    /**
     * Guarda datos en un nodo de la base de datos de Firebase.
     * @param string $path Ruta del nodo.
     * @param array $data Datos a guardar.
     */
    public static function set(string $path, array $data): void
    {
        $firebase = new FirebaseLib(self::URL, self::TOKEN);
        $firebase->set($path, $data);
    }

    /**
     * Obtiene los datos de un nodo de la base de datos de Firebase.
     * @param string $path Ruta del nodo.
     * @param array $options Opciones para la consulta.
     */
    public static function get(string $path, array $options = []): array|false
    {
        $firebase = new FirebaseLib(self::URL, self::TOKEN);
        $data = $firebase->get($path, $options);
        if($data == "null"){
            return false;
        }

        $response = json_decode(str($data), true);
        if($response == NULL){
            return false;
        }
        return $response;
    }
}
