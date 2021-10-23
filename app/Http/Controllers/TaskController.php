<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Type;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $collumName = $request->collumname;
        $sortby = $request->sortby;
        if(!$collumName && !$sortby) {
            $collumName = 'id';
            $sortby = 'asc';
        }


        $tasks= Task::orderBy( $collumName, $sortby)->paginate(5);
        // $tasks= Task::orderBy( $collumName, $sortby)->get();
        return view("task.index", ["tasks" =>$tasks, 'collumName'=> $collumName, 'sortby' => $sortby]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types= Type::all();
        return view("task.create", ["types" =>$types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task ->title = $request->task_title;
        $task ->description = $request->task_description;
        $task ->type_id = $request->task_type_id;
        $task ->start_date = $request->task_start_date;
        $task ->end_date = $request->task_end_date;
        $task ->logo = $request->task_logo;

        $task->save();
        return redirect()->route("task.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view("task.show", ["task" => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $types = Type::all();
        return view("task.edit",["task"=>$task, "types"=>$types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        $task ->title = $request->task_title;
        $task ->description = $request->task_description;
        $task ->type_id = $request->task_type_id;
        $task ->start_date = $request->task_start_date;
        $task ->end_date = $request->task_end_date;
        $task ->logo = $request->task_logo;

        $task->save();
        return redirect()->route("task.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $types_count = $task->taskTypes->count();

        if($types_count!=0) {
            return redirect()->route("task.index")->with('error_message','Istrinti negalima Task type egzistuoja');
        }
        $task->delete();
        return redirect()->route("task.index")->with('success_message','Task sekmingai istrintas, Valio!!!');
    }

    public function search(Request $request) {
        $search = $request->search;

        $tasks = Task::query()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);

        return view("task.search",['tasks'=> $tasks]);
    }
}
