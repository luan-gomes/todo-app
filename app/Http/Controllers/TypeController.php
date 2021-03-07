<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Task;
use Illuminate\Http\Request;
use Log;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Type::orderBy('name','ASC')->get();
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
        $newType = new Type;
        $newType->name = $request->type["name"];
        $newType->save();

        return $newType;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingType = Type::find($id);

        if($existingType){
            $existingType->name = (isset($request->type["name"]) && $request->type["name"])? $request->type["name"] : $existingType->name;
            $existingType->save();
            return $existingType;
        }

        return "Tipo não encontrado.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingType = Type::find($id);

        if($existingType){
            $existingTasks = Task::where('type_id',$existingType->id)->get();
            if(count($existingTasks) === 0){
                $existingType->delete();
                return "Tipo excluído com sucesso!";
               
            } else {
                return response("Este tipo tem tarefas vinculadas a ele. Você precisa excluí-las primeiro.", 400);
            }
        }

        return "Tipo não encontrado.";
    }
}
