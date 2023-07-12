<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Producto;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('crud.index')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productos = new Producto();
        $productos->codigo = $request->get('codigo');
        $productos->descripcion = $request->get('descripcion');
        $productos->cantidad = $request->get('cantidad');
        $productos->precio = $request->get('precio');

        $productos->save();

        return redirect("/productos");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::find($id);
        return view("crud.update")->with('producto',$producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);
        $producto->codigo = $request->get('codigo');
        $producto->descripcion = $request->get('descripcion');
        $producto->cantidad = $request->get('cantidad');
        $producto->precio = $request->get('precio');

        $producto->save();

        return redirect("/productos");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/productos');
    }
}
