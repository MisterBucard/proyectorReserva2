<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Habitacion;
use App\Models\Huesped;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::paginate(20);

        return view('PaginaPrincipalReserva')->with('reservas', $reservas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $huespeds=Huesped::all();
        $habitacions=Habitacion::all();

        return view("FormReserva",['huespeds'=>$huespeds,'habitacions'=>$habitacions]);
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
            'fechaI'=>'required|date',
            'fechaF'=>'required|date',
            'NumH'=>'required|numeric|min:0|max:100',
            'Habitacion_id'=>'required|numeric:reservas,Habitacion_id',
            'Huesped_id'=>'required|numeric:reservas,Huesped_id'
            
            
            
        ]);



        $newreserva = new Reserva();

        //Formulario
        $newreserva->Fecha_Entrada= $request->input('fechaI');
        $newreserva->Fecha_Salida = $request->input('fechaF');
        $newreserva->Numero_de_Huespedes = $request->input('NumH');
        $newreserva->Habitacion_id = $request->input('Habitacion_id');
        $newreserva->Huesped_id = $request->input('Huesped_id');
    
        

        $guardado = $newreserva->save();

        if ($guardado) {
            return redirect()->route('reserva.index')
                ->with('mensaje', 'La Reserva ha sido creado exitosamente.'); //mensaje de guardado
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva =Reserva::findOrfail($id);
        $huespeds = Huesped::all();
        $habitacions = Habitacion::all();
        return view('PaginaReservaIndividual',['reserva' => $reserva, 'huespeds' => $huespeds, 'habitacions' => $habitacions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        return view("FormReserva")->with("reserva", $reserva);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fechaI'=>'required|date',
            'fechaF'=>'required|date',
            'NumH'=>'required|numeric|min:0|max:100',
            'Habitacion_id'=>'required|numeric|exists:huespedes,id',
            'Huesped_id'=>'required|numeric|exists:huespedes,id'
            
        ]);



       
        $reser = Reserva::findOrFail($id);

        //Formulario
        $reser->Fecha_Entrada= $request->input('fechaI');
        $reser->Fecha_Salida = $request->input('fechaF');
        $reser->Numero_de_Huespedes = $request->input('NumH');
        $reser->Habitacion_id = $request->input('Habitacion_id');
        $reser->Huesped_id = $request->input('Huesped_id');
    
        

        $guardado = $reser->save();

        if ($guardado) {
            return redirect()->route('reserva.index')
                ->with('mensaje', 'La Reserva ha sido creado exitosamente.'); //mensaje de guardado
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reserva::destroy($id);

        //Redirigir

        return redirect('/reservas')->with('mensaje', 'La Reserva ha sido eliminada exitosamente.');
    }
}
