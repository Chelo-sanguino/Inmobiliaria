<?php

namespace App\Core\Dominio;

interface PropiedadRepository
{
    /**
     * Busca propiedades basadas en un filtro.
     *
     * @param string $filtro
     * @return \App\Core\Dominio\Propiedad[]
     */
    public function search(string $filtro): array;

    /**
     * Genera un nuevo identificador único para una propiedad.
     *
     * @return int
     */
    public function nextIdentity(): int;

    /**
     * Almacena una propiedad en el repositorio.
     *
     * @param Propiedad $propiedad
     * @return bool
     */
    public function store(Propiedad $propiedad): bool;

    /**
     * Elimina una propiedad del repositorio utilizando su identificador.
     *
     * @param int $propiedadId
     * @return bool
     */
    public function remove(int $propiedadId): bool;

    /**
     * Recupera una propiedad a partir de su identificador.
     *
     * @param int $id
     * @return Propiedad|false
     */
    public function getById(int $id): Propiedad|false;
}