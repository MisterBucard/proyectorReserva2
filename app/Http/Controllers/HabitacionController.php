<?php

namespace App\Http\Controllers;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitacions = Habitacion::paginate(20);
        return view('PaginaPrincipalHabitacion')->with('habitacions', $habitacions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("FormHabitacion");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //VALIDAR

            $request->validate([
            'numHabitacion'=>'required|numeric|min:0|max:5000|unique:habitacions,Num_Habitacion',
            'precio'=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'tipo'=>'required|in:Individual,Doble,Suite'
            
               ]);



        $newhabit = new Habitacion();

        //Formulario
        $newhabit->Num_Habitacion = $request->input('numHabitacion');
        $newhabit->Precio = $request->input('precio');
        $newhabit->Tipo = $request->input('tipo');
        

        $creado = $newhabit->save();

        if ($creado) {
            return redirect()->route('habitacion.index')
                ->with('mensaje', 'La habitacion ha sido creada exitosamente.'); //mensaje de guardado
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habitacion =Habitacion::findOrfail($id);
        return view('PaginaHabitacionIndividual')->with('habitacion', $habitacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        return view("FormHabitacion")->with("habitacion", $habitacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //VALIDAR
        // van los nombres de los names del formulario
        $request->validate([
            'numHabitacion'=>'required|numeric|min:0|max:5000',
            'precio'=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'tipo'=>'required|in:Individual,Doble,Suite'
            
               ]);




      
        $habitacion = Habitacion::findOrFail($id);
        //Formulario
 // $habitacion->nombre de la columna de la migracion
        $habitacion->Num_Habitacion = $request->input('numHabitacion');//van los nombres de los names del formulario
        $habitacion->Precio = $request->input('precio');
        $habitacion->Tipo = $request->input('tipo');
        

        $creado = $habitacion->save();

        if ($creado) {
            return redirect()->route('habitacion.index')
                ->with('mensaje', 'La habitacion ha sido modificada exitosamente.'); //mensaje de guardado
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Habitacion::destroy($id);

        //Redirigir

        return redirect('/habitaciones')->with('mensaje', 'La habitacion ha sido eliminada exitosamente.');
    }
}
