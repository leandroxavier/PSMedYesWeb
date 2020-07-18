<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Funcionarios;
use App\Http\Resources\ Funcionario as FuncionarioResource;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get funcionarios
        $funcionarios = Funcionarios::orderBy('created_at','desc')->paginate(10);

        //return funcionarios as a resource
        return FuncionarioResource::collection($funcionarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $funcionario = $request->isMethod('put') ? Funcionarios::findOrFail($request->funcionario_id) : new Funcionarios;

       $funcionario->id = $request->input('funcionario_id');
       $funcionario->nome = $request->input('nome');
       $funcionario->sobrenome = $request->input('sobrenome');

       if($funcionario->save()){
           return new FuncionarioResource($funcionario);
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionarios::findOrFail($id);

        return new FuncionarioResource($funcionario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionarios::findOrFail($id);

        if($funcionario->delete()){
            return new FuncionarioResource($funcionario);
        }
        
    }
}
