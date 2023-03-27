<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //consulta a la base de datos
        //$productos = Producto::all();
        $productos = Producto::get();
        //paso por vista
        return view('producto.productoIndex', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.productoForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // $producto = new Producto();
        // $producto-> marca = $request-> marca;
        // $producto-> categoria = $request-> categoria;
        // $producto-> folio = $request-> folio;
        // $producto->save();
        Producto::create($request->all());

        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('producto.productoShow', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('producto.productoForm', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
        // $producto->marca = $request->marca;
        // $producto->categoria = $request->categoria;
        // $producto->folio = $request->folio;
        // $producto->save();
        Producto::where('id', $producto->id)->update($request->except('_token','_method'));        

        return redirect()->route('producto.show', $producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
