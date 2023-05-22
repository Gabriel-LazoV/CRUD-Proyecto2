<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    private $rules;

    public function __construct()
    {
        $this->middleware('auth');
        $this->rules=[
            'nombre'=> 'required|string|min:3|max:255',
            'marca'=> 'required|string|min:3|max:255',
            'correo'=> 'required|string|min:3|max:500',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //consulta a la base de datos
        $proveedores = Proveedor::get();
        //paso por vista
        return view('producto.proveedor.proveedorIndex', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.proveedor.proveedorForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$request->validate($this->rules + ['folio'=> ['required','integer','unique:productos,folio']]);
        
        //$request->merge(['user_id' => Auth::id()]);
        $request->validate($this->rules + ['telefono'=> ['required','numeric','digits:10','unique:proveedors,telefono']]);
        Proveedor::create($request->all());

        return redirect()->route('proveedor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
        return view('producto.proveedor.proveedorShow', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        //
        return view('producto.proveedor.proveedorForm', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
        $request->validate($this->rules + ['telefono'=> [
            'required',
            'numeric',
            'digits:10',
            Rule::unique('proveedors')->ignore($proveedor->id)
            ]]);
        
        Proveedor::where('id', $proveedor->id)->update($request->except('_token','_method'));        

        return redirect()->route('proveedor.show', $proveedor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        //
        $proveedor->delete();
        return redirect()->route('proveedor.index');
    }
}
