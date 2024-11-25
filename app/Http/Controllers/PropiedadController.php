<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infraestructura\FirebaseConnection;

class PropiedadController extends Controller
{
    public function index()
    {
        $data = FirebaseConnection::get("/propiedades");
        $propiedades = [];

        if ($data) {
            foreach ($data as $id => $row) {
                $propiedades[$id] = [
                    'id' => $id,
                    'ubicacion' => $row['ubicacion'],
                    'tipo_propiedad' => $row['tipo_propiedad'],
                    'tipo_oferta' => $row['tipo_oferta'],
                    'superficie' => $row['superficie'],
                    'precio' => $row['precio'],
                    'estado' => $row['estado'],
                ];
            }
        }

        return view('propiedades.index', compact('propiedades'));
    }

    public function create()
    {
        return view('propiedades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ubicacion' => 'required',
            'tipo_propiedad' => 'required',
            'tipo_oferta' => 'required',
            'superficie' => 'required|numeric',
            'precio' => 'required|numeric',
            'estado' => 'required',
        ]);

        $data = [
            'ubicacion' => $request->ubicacion,
            'tipo_propiedad' => $request->tipo_propiedad,
            'tipo_oferta' => $request->tipo_oferta,
            'superficie' => $request->superficie,
            'precio' => $request->precio,
            'estado' => $request->estado,
        ];

        FirebaseConnection::set("/propiedades/" . uniqid(), $data); // Guardar en Firebase
        return redirect()->route('propiedades.index')->with('success', 'Propiedad creada exitosamente.');
    }

    public function show($id)
    {
        $data = FirebaseConnection::get("/propiedades/$id");
        if (!$data) {
            abort(404);
        }

        return view('propiedades.show', ['propiedad' => $data]);
    }

    public function edit($id)
    {
        $data = FirebaseConnection::get("/propiedades/$id");
        if (!$data) {
            abort(404);
        }

        return view('propiedades.edit', ['propiedad' => $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ubicacion' => 'required',
            'tipo_propiedad' => 'required',
            'tipo_oferta' => 'required',
            'superficie' => 'required|numeric',
            'precio' => 'required|numeric',
            'estado' => 'required',
        ]);

        $data = [
            'ubicacion' => $request->ubicacion,
            'tipo_propiedad' => $request->tipo_propiedad,
            'tipo_oferta' => $request->tipo_oferta,
            'superficie' => $request->superficie,
            'precio' => $request->precio,
            'estado' => $request->estado,
        ];

        FirebaseConnection::set("/propiedades/$id", $data); // Actualizar en Firebase
        return redirect()->route('propiedades.index')->with('success', 'Propiedad actualizada exitosamente.');
    }

    
}
