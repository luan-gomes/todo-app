<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Log;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::orderBy('deadline', 'ASC')->get();
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
            if($request->task["completed"] == false){
                $existingTask->completed = $request->task["completed"];
                $existingTask->completed_at = null;
            } else if ($request->task["completed"] == true){
                $existingTask->completed = $request->task["completed"];
                $existingTask->completed_at =date('Y/m/d');
            }
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

    public function getTasksFiltered($filter)
    {
        if($filter === "all"){
            return Task::orderBy('deadline', 'ASC')->get();
        }

        return Task::where('type_id', $filter)->orderBy('deadline', 'ASC')->get();
    }
}
