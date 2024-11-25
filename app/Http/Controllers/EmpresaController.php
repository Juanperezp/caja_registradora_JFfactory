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
        //
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
