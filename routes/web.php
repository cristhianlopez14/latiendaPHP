<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/', function () {
    return view('welcome');
});

// Primera ruta en laravel
Route::get('hola', function (){
    echo "hola gg";
});

//Segunda ruta en laravel
Route::get('Arreglos', function(){
    $estudiantes = ["AN" => "Ana", 
                    "JU" =>"Juana", 
                    "PA" =>"Paola"];
   echo "<pre>"; 
   var_dump($estudiantes);
   echo "</pre>";
   echo "<hr />";


//Agregar Posición
 
$estudiantes ["CR"] = "Cristhian";
echo "<pre>"; 
var_dump($estudiantes);
echo "</pre>";

//Retirar elementos de arreglo

echo "<hr />";
unset($estudiantes["JU"]);
echo "<pre>"; 
var_dump($estudiantes);
echo "</pre>";
});*/

//Segunda ruta paises

Route:: get('paises', function(){
    $paises=["Colombia" =>[
        "capital" => "Bogota",
        "moneda" => "Peso",
        "poblacion" => 51.6,
        "ciudades" => [
            "Bogotá",
            "Medellín",
            "Cali"
        ]
    ], "Peru"=>[
        "capital" => "Lima",
        "moneda" => "Sol",
        "poblacion" => 32.97,
        "ciudades" =>[
            "Cusco",
            "Trujillo",
            "Ayacucho"
        ]
    ], "Paraguay"=>[
        "capital" => "Asuncion",
        "moneda" => "Guarani",
        "poblacion" => 7.1,
        "ciudades" =>[
            "Ciudad del este",
            "Paraguarí"
        ]
    ]
    ];
    /*echo "<pre>"; 
    var_dump($paises);
    echo "</pre>";
    echo "<hr />";

 foreach($paises as $pais => $infopais){
    echo"<h1>$pais</h1>";
    foreach($infopais as $clave => $valor){
    echo "$clave: $valor <br/>";
    }
    echo "<hr />";
 }*/


 //mostrar la vista de paises

 return view('paises')
        ->with("paises", $paises );
});



Route::resource('productos', ProductoController::class);

