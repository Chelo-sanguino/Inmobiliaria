<?php

namespace App\Infraestructura;

use Firebase\FirebaseLib;
use Exception;

class FirebaseConnection
{
    const URL = 'https://inmobiliaria-6eba3-default-rtdb.firebaseio.com/';
    const TOKEN = 'MTCuY5sWPIoRQKdAcXkdODMZ7N86lUBW2XHQvFk6';

    /**
     * Obtiene una instancia de FirebaseLib.
     * @return FirebaseLib
     */
    private static function getFirebaseInstance(): FirebaseLib
    {
        return new FirebaseLib(self::URL, self::TOKEN);
    }

    /**
     * Crear o actualizar una propiedad en Firebase.
     * @param string $idPropiedad ID único de la propiedad.
     * @param array $data Datos de la propiedad.
     * @throws Exception Si ocurre un error al guardar los datos.
     */
    public static function guardarPropiedad(string $idPropiedad, array $data): void
    {
        try {
            $firebase = self::getFirebaseInstance();
            $firebase->set("Propiedad/$idPropiedad", $data);
        } catch (Exception $e) {
            throw new Exception('Error al guardar la propiedad: ' . $e->getMessage());
        }
    }

    /**
     * Obtener los datos de una propiedad por su ID.
     * @param string $idPropiedad ID único de la propiedad.
     * @return array|null Datos de la propiedad o null si no existe.
     * @throws Exception Si ocurre un error al obtener los datos.
     */
    public static function obtenerPropiedad(string $idPropiedad): ?array
    {
        try {
            $firebase = self::getFirebaseInstance();
            $data = $firebase->get("Propiedad/$idPropiedad");
            return $data !== "null" ? json_decode($data, true) : null;
        } catch (Exception $e) {
            throw new Exception('Error al obtener la propiedad: ' . $e->getMessage());
        }
    }

    /**
     * Actualizar una propiedad parcialmente en Firebase.
     * @param string $idPropiedad ID único de la propiedad.
     * @param array $updates Datos a actualizar.
     * @throws Exception Si ocurre un error al actualizar los datos.
     */
    public static function actualizarPropiedad(string $idPropiedad, array $updates): void
    {
        try {
            $firebase = self::getFirebaseInstance();
            $existingData = self::obtenerPropiedad($idPropiedad);
            if (!$existingData) {
                throw new Exception("La propiedad con ID $idPropiedad no existe.");
            }

            $firebase->set("Propiedad/$idPropiedad", array_merge($existingData, $updates));
        } catch (Exception $e) {
            throw new Exception('Error al actualizar la propiedad: ' . $e->getMessage());
        }
    }

    /**
     * Eliminar una propiedad por su ID.
     * @param string $idPropiedad ID único de la propiedad.
     * @throws Exception Si ocurre un error al eliminar los datos.
     */
    public static function eliminarPropiedad(string $idPropiedad): void
    {
        try {
            $firebase = self::getFirebaseInstance();
            $firebase->set("Propiedad/$idPropiedad", null);
        } catch (Exception $e) {
            throw new Exception('Error al eliminar la propiedad: ' . $e->getMessage());
        }
    }
}
