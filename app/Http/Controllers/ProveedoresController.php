<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedores::latest()->get();

        return view('admin.proveedores.listadoproveedores', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.proveedores.forproveedores');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'        => ['required', 'string', 'max:255'],
            'nit_documento' => ['nullable', 'string', 'max:255', 'unique:proveedores,nit_documento'],
            'telefono'      => ['nullable', 'string', 'max:30'],
            'email'         => ['nullable', 'string', 'email', 'max:255'],
            'direccion'     => ['nullable', 'string', 'max:255'],
            'contacto'      => ['nullable', 'string', 'max:255'],
        ]);

        $proveedor = new Proveedores();
        $proveedor->nombre = $request->post('nombre');
        $proveedor->nit_documento = $request->post('nit_documento');
        $proveedor->telefono = $request->post('telefono');
        $proveedor->email = $request->post('email');
        $proveedor->direccion = $request->post('direccion');
        $proveedor->contacto = $request->post('contacto');
        $proveedor->estado = 'activo';
        $proveedor->save();

        return redirect()
            ->route('proveedores.create')
            ->with('success', '¡Proveedor registrado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedores $proveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedores $proveedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedores $proveedores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedores $proveedores)
    {
        //
    }
}