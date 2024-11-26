<?php

namespace App\Core\Dominio;

class Propiedad
{
    private bool $estado;
    private float $precio;
    private float $superficie;
    private string $tipoOferta;
    private string $tipoPropiedad;
    private float $ubicacion;

    public function __construct(
        bool $estado, 
        float $precio, 
        float $superficie, 
        string $tipoOferta, 
        string $tipoPropiedad, 
        float $ubicacion
    ) {
        $this->estado = $estado;
        $this->precio = $precio;
        $this->superficie = $superficie;
        $this->tipoOferta = $tipoOferta;
        $this->tipoPropiedad = $tipoPropiedad;
        $this->ubicacion = $ubicacion;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getSuperficie()
    {
        return $this->superficie;
    }

    public function getTipoOferta()
    {
        return $this->tipoOferta;
    }

    public function getTipoPropiedad()
    {
        return $this->tipoPropiedad;
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    public function setSuperficie($value)
    {
        $this->superficie = $value;
    }

    public function setEstado($value)
    {
        $this->estado = $value;
    }

    public function setPrecio($value)
    {
        $this->precio = $value;
    }

    public function setTipoOferta($value)
    {
        $this->tipoOferta = $value;
    }

    public function setTipoPropiedad($value)
    {
        $this->tipoPropiedad = $value;
    }

    public function setUbicacion($value)
    {
        $this->ubicacion = $value;
    }
}