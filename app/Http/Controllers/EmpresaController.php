<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmpresaController extends Controller


{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    $paises = DB:: table('countries')->get();
    $estados = DB:: table('states')->get(); 
    $ciudades = DB:: table('cities')->get();
    $monedas = DB:: table('currencies')->get();
    return view("admin.empresas.create",compact('paises', "estados", 'ciudades','monedas'));
    }


    public function buscar_pais($id_pais) {
        try {  
            $estados = DB::query('states')->where('country_id',$id_pais)->get();
             return view('admin.empresas.cargar_estados',compact('estados'));
        }catch(\Exception $exception){
            return response()->json(['mensaje'=>'Error']);

        }
           
    }
    
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      


       $request->validate([
        'pais' => 'required',
        'nombre_empresa',

        'tipo_empresa'=>'required',
        'nit'=>'required',
        'telefono'=>'required',
        'email'=>'required',
        'cantidad_impuesto'=>'required',
        'nombre_impuesto'=>'required',
        'moneda'=>'required',
        'direccion'=>'required',
        'ciudad' => 'required',
        'departamento' => 'required',
        'codigo_postal'=>'required',
        'logo'=>'required',
    ]);
      $empresa = new Empresa();
      $empresa->pais = $request->pais;
      $empresa->tipo_empresa = $request->tipo_empresa;
      $empresa->nit = $request->nit;
      $empresa->telefono = $request->telefono;
      $empresa->email = $request->email;
      $empresa->cantidad_impuesto = $request->cantidad_impuesto;
      $empresa->nombre_impuesto = $request->nombre_impuesto;
      $empresa->modena = $request->modena;
      $empresa->direccion = $request->direccion;
      $empresa->ciudad = $request->ciudad;
      $empresa->departamento = $request->departamento;
      $empresa->codigo_postal = $request->codigo_postal;
      $empresa->logo = $request->logo;
      $empresa->save();
      
      $usuario= new User();
      $usuario->name='Admin';
      $usuario->email=$request->email;
      $usuario->password = Hash::make($request['nit']);
      $usuario->empresa_id=$empresa->id;
      $usuario->save();


        return redirect()->route('admin.index');
            
       


}

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
