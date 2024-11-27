<?php

namespace App\Core\Application;

use App\Core\Dominio\PropiedadRepository;
use App\Core\Dominio\Propiedad;

class PropiedadService
{
    private PropiedadRepository $propiedadRepository;

    public function __construct(PropiedadRepository $propiedadRepository)
    {
        $this->propiedadRepository = $propiedadRepository;
    }

    public function crearPropiedad(array $data): Propiedad
    {
        // Aquí se puede validar los datos antes de crear la propiedad
        $propiedad = new Propiedad($data);
        $this->propiedadRepository->store($propiedad);
        return $propiedad;
    }

    public function buscarPropiedades(string $filtro): array
    {
        return $this->propiedadRepository->search($filtro);
    }

    public function obtenerPropiedadPorId(int $id): Propiedad|false
    {
        return $this->propiedadRepository->getById($id);
    }

    public function eliminarPropiedad(int $id): bool
    {
        return $this->propiedadRepository->remove($id);
    }

    public function generarNuevoId(): int
    {
        return $this->propiedadRepository->nextIdentity();
    }

}