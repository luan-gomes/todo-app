<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::orderBy('deadline', 'DESC')->get();
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
        $newTask = new Task;
        $newTask->description = $request->task['description'];
        $newTask->deadline = $request->task['deadline'];
        $newTask->type_id = $request->task['type_id'];
        $newTask->completed = false;
        $newTask->completed_at =null;
        $newTask->save();

        return $newTask;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingTask = Task::find($id);

        if($existingTask){

            $existingTask->description = (isset($request->task["description"]) && $request->task["description"])? $request->task["description"] : $existingTask->description;
            $existingTask->deadline = (isset($request->task["deadline"]) && $request->task["deadline"])? $request->task["deadline"] : $existingTask->deadline;
            $existingTask->type_id = (isset($request->task["type_id"]) && $request->task["type_id"])? $request->task["type_id"] : $existingTask->type_id;
            $existingTask->completed = (isset($request->task["completed"]) && $request->task["completed"])? $request->task["completed"] : $existingTask->completed;
            $existingTask->completed_at = (isset($request->task["completed_at"]) && $request->task["completed_at"])? $request->task["completed_at"] : $existingTask->completed_at;
            $existingTask->save();

            return $existingTask;
        }

        return "Tarefa não encontrada!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingTask = Task::find($id);

        if($existingTask){
            $existingTask->delete();
            return "Tarefa excluída com sucesso!";
        }

        return "Tarefa não encontrada.";
    }
}
