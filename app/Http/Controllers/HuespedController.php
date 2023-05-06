<?php

namespace App\Http\Controllers;

use App\Models\Huesped;
use Illuminate\Http\Request;//esta parte es muy importante
class HuespedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $huespeds = Huesped::paginate(20);
        return view('PaginaPrincipalHuesped')->with('huespeds', $huespeds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("FormHuesped");
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
            'nombre'=>'required|regex:/[a-zA-Z áéíóúñ]+/i|min:3',
            'apellido'=>'required||regex:/[a-zA-Z áéíóúñ]+/i|min:3',
            'correo'=>'required|email:rfc,dns',
            'telef'=>'required|numeric'
            
            
        ]);



        $newhuesp = new Huesped();

        //Formulario
        $newhuesp->nombre= $request->input('nombre');
        $newhuesp->apellido = $request->input('apellido');
        $newhuesp->correo_electronico = $request->input('correo');
        $newhuesp->telefono = $request->input('telef');
        

        $creado = $newhuesp->save();

        if ($creado) {
            return redirect()->route('huesped.index')
                ->with('mensaje', 'El Huesped ha sido creado exitosamente.'); //mensaje de guardado
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Huesped  $huesped
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $huesped =Huesped::findOrfail($id);
        return view('PaginaHuespedIndividual')->with('huesped',$huesped );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Huesped  $huesped
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $huesped = Huesped::findOrfail($id);
        return view("FormHuesped")->with('huesped',$huesped);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Huesped  $huesped
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          //VALIDAR

          $request->validate([
            'nombre'=>'required|regex:/[a-zA-Z áéíóúñ]+/i|min:3',
            'apellido'=>'required||regex:/[a-zA-Z áéíóúñ]+/i|min:3',
            'correo'=>'required|email:rfc,dns',
            'telef'=>'required|numeric'
        ]);



        $huesp = Huesped::findOrfail($id);

        //Formulario
        $huesp->nombre= $request->input('nombre');
        $huesp->apellido = $request->input('apellido');
        $huesp->corrreo = $request->input('correo');
        $huesp->telefono = $request->input('telef');
        

        $creado = $huesp->save();

        if ($creado) {
            return redirect()->route('huesped.index')
                ->with('mensaje', 'El Huesped ha sido modificado exitosamente.'); //mensaje de guardado
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Huesped  $huesped
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Huesped::destroy($id);

        //Redirigir

        return redirect('/huespedes')->with('mensaje', 'El huesped ha sido eliminado exitosamente.');
    }
}
