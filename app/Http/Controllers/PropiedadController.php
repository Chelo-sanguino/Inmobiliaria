<?php

namespace App\Http\Controllers;

use App\Core\Dominio\Propiedad;
use App\Infraestructura\PropiedadRepositoryFb;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    private PropiedadRepositoryFb $repository;

    public function __construct()
    {
        $this->repository = new PropiedadRepositoryFb();
    }

    /**
     * Obtener todas las propiedades.
     */
    public function index()
    {
        $propiedades = $this->repository->all();
        return response()->json($propiedades);
    }

    /**
     * Crear una nueva propiedad.
     */
    public function store(Request $request)
    {
        $request->validate([
            'estado' => 'required|boolean',
            'precio' => 'required|numeric',
            'superficie' => 'required|numeric',
            'tipoOferta' => 'required|string',
            'tipoPropiedad' => 'required|string',
            'ubicacion' => 'required|numeric',
        ]);

        $propiedad = new Propiedad(
            $request->estado,
            $request->precio,
            $request->superficie,
            $request->tipoOferta,
            $request->tipoPropiedad,
            $request->ubicacion
        );

        $this->repository->create($propiedad);

        return response()->json(['message' => 'Propiedad creada exitosamente'], 201);
    }

    /**
     * Obtener una propiedad por su ID.
     */
    public function show($id)
    {
        $propiedad = $this->repository->find($id);

        if (!$propiedad) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        }

        return response()->json($propiedad);
    }

    /**
     * Actualizar una propiedad existente.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|boolean',
            'precio' => 'required|numeric',
            'superficie' => 'required|numeric',
            'tipoOferta' => 'required|string',
            'tipoPropiedad' => 'required|string',
            'ubicacion' => 'required|numeric',
        ]);

        $propiedad = $this->repository->find($id);

        if (!$propiedad) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        }

        $propiedad->setEstado($request->estado);
        $propiedad->setPrecio($request->precio);
        $propiedad->setSuperficie($request->superficie);
        $propiedad->setTipoOferta($request->tipoOferta);
        $propiedad->setTipoPropiedad($request->tipoPropiedad);
        $propiedad->setUbicacion($request->ubicacion);

        $this->repository->update($id, $propiedad);

        return response()->json(['message' => 'Propiedad actualizada exitosamente']);
    }

    /**
     * Eliminar una propiedad.
     */
    public function destroy($id)
    {
        $propiedad = $this->repository->find($id);

        if (!$propiedad) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        }

        $this->repository->delete($id);

        return response()->json(['message' => 'Propiedad eliminada exitosamente']);
    }
}
