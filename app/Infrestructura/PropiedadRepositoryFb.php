<?php

namespace App\Infraestructura;

use App\Core\Dominio\Propiedad;
use App\Infraestructura\FirebaseConnection;

class PropiedadRepositoryFb
{
    private const PATH = '/propiedades';

    public function all(): array
    {
        $data = FirebaseConnection::get(self::PATH);
        $propiedades = [];

        if ($data) {
            foreach ($data as $id => $row) {
                $propiedades[$id] = new Propiedad(
                    $row['estado'],
                    $row['precio'],
                    $row['superficie'],
                    $row['tipoOferta'],
                    $row['tipoPropiedad'],
                    $row['ubicacion']
                );
            }
        }

        return $propiedades;
    }

    public function create(Propiedad $propiedad): void
    {
        $data = [
            'estado' => $propiedad->getEstado(),
            'precio' => $propiedad->getPrecio(),
            'superficie' => $propiedad->getSuperficie(),
            'tipoOferta' => $propiedad->getTipoOferta(),
            'tipoPropiedad' => $propiedad->getTipoPropiedad(),
            'ubicacion' => $propiedad->getUbicacion(),
        ];

        FirebaseConnection::set(self::PATH . '/' . uniqid(), $data);
    }

    public function update(string $id, Propiedad $propiedad): void
    {
        $data = [
            'estado' => $propiedad->getEstado(),
            'precio' => $propiedad->getPrecio(),
            'superficie' => $propiedad->getSuperficie(),
            'tipoOferta' => $propiedad->getTipoOferta(),
            'tipoPropiedad' => $propiedad->getTipoPropiedad(),
            'ubicacion' => $propiedad->getUbicacion(),
        ];

        FirebaseConnection::set(self::PATH . '/' . $id, $data);
    }

    public function delete(string $id): void
    {
        FirebaseConnection::set(self::PATH . '/' . $id, null);
    }

    public function find(string $id): ?Propiedad
    {
        $data = FirebaseConnection::get(self::PATH . '/' . $id);
        if ($data) {
            return new Propiedad(
                $data['estado'],
                $data['precio'],
                $data['superficie'],
                $data['tipoOferta'],
                $data['tipoPropiedad'],
                $data['ubicacion']
            );
        }

        return null;
    }
}
