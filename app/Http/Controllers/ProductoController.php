<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Existencia;
use App\Models\Productos_Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    private $rules;

    public function __construct()
    {
        // $this->middleware('auth');
        $this->rules=[
            'marca'=> 'required|string|min:3|max:255',
            'categoria'=> 'required|string|min:3|max:255',
        ];
    }
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
        // $proveedor= Productos_Proveedor::with(['proveedor' => function ($query) {
        //     $query->select('nombre');
        // }])->get()->pluck('proveedor.nombre');
        $proveedor = Proveedor::select('id','nombre')->orderBy('nombre','asc')->distinct()->pluck('id','nombre'); //metodo para obtener resultados unicos disti

        $product=new Producto();
        return view('producto.productoForm',compact('proveedor','product'));
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
        $request->validate($this->rules + ['folio'=> ['required','integer','unique:productos,folio']]);
        
        //$request->merge(['user_id' => Auth::id()]);
        $product=Producto::create($request->all());
        Productos_Proveedor::create(['proveedor_id'=>$request->proveedor, 'producto_id'=>$product->id]);
        $product->existencia()->create(['producto_id'=>$product->id,'cantidad'=>$request->cantidad,'ubicacion'=>$request->ubicacion]); 
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
        $request->validate($this->rules + ['folio'=> [
            'required',
            'integer',
            Rule::unique('productos')->ignore($producto->id)
            ]]);
        
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
