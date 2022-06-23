<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categoria;
//dependencia para el validador
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo"Aca lista la lista de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccionar Marcas
        $marcas =Marca::all();
        //Seleccionar Categorias
        $categorias =Categoria::all();
        //las enviamos a la vista
        return view("productos.new")
        ->with('marcas', $marcas)
        ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //1. Validacion

        $reglas=[
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:10|max:20',
            "precio" => 'required|numeric',
            "imagen" => 'required|image',
            "categoria" => 'required',
            "marca" => 'required'

        ];

        $mensajes=[
            "required" => "Este Campo es Obligatorio",
            "alpha" => "Este campo solo debe contener Letras",
            "numeric" => "Este campo es Númerico",
            "image" => "Carga un archivo tipo imagen",
            "min" => "Minimo :min valor",
            "max" => "Maximo :max valor"
        ];

        //2. crear objeto validador
        $v = Validator::make($request->all(), $reglas, $mensajes);

        //3. validar
        //Metodo fails retorna un true si la validacio falla
        //y false: si los sojn validos

        if($v->fails()){
            //Validacion incorrecta
            //Mostrar la vista new 
            //Llevando los errores
            return redirect('productos/create')
                ->withErrors($v);
        }else{
            //Validacion correcta
          $archivo = $request->imagen;
          $nombre_archivo = $archivo->getClientOriginalName();

          $ruta = public_path();
          $archivo->move("$ruta/img", $nombre_archivo);
          $producto = new Producto;
          $producto->nombre = $request->nombre;
          $producto->desc = $request->desc;
          $producto->precio = $request->precio;
          $producto->imagen = $nombre_archivo;
          $producto->marca_id = $request->marca;
          $producto->categoria_id = $request->categoria;
          $producto->save();
          return redirect('productos/create')
          ->with("mensajito", "producto registrado");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show( $producto)
    {
        echo"Aca va el detalle de producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit( $producto)
    {
        echo"Aca va el formulario a editar el producto con id: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
