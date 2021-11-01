<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\PaginatonSetting;
use App\Models\Type;
use App\Models\Owner;
use Illuminate\Http\Request;
use PDF;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types=Type::all();
        $pages=PaginatonSetting::all();
        $collumName = $request->collumname;
        $sortby = $request->sortby;
        $pagination = $request->pagination;


        if(!$collumName && !$sortby && !$pagination) {
            $collumName = 'id';
            $sortby = 'asc';
            $pagination = 10 ;
        }


        $tasks = Task::orderBy( $collumName, $sortby)->paginate($pagination);

        return view("task.index", ["tasks" =>$tasks, 'types'=>$types, 'collumName'=> $collumName, 'sortby' => $sortby, 'pages' => $pages, 'pagination' => $pagination]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types= Type::all();
        $owners=Owner::all();
        return view("task.create", ["types" =>$types, "owners"=>$owners]);
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

        $validateVar = $request->validate([
            'task_title' => 'required|min:6|max:255|alpha',
            'task_description' => 'required|min:6|max:1500|',
            'task_start_date' => 'required|date',
            'task_end_date' => 'required|date|after:start_date',
            'task_logo' => 'image',
            'task_type_id' => 'numeric|integer',
            'task_owner_id' => 'numeric|integer',

        ]);

        $task ->title = $request->task_title;
        $task ->owner_id = $request->task_owner_id;
        $task ->description = $request->task_description;
        $task ->type_id = $request->task_type_id;
        $task ->start_date = $request->task_start_date;
        $task ->end_date = $request->task_end_date;
        $task ->logo = $request->task_logo;

        if($request->has('task_logo'))
        {
            $imageName = time().'.'.$request->task_logo->extension();
            $task->logo = '/images/'.$imageName;
            $request->task_logo->move(public_path('images'), $imageName);
        } else {
            $task->image_url = '/images/placeholder.png';
        }


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
        $owners=Owner::all();
        return view("task.edit",["task"=>$task, "types"=>$types, "owners"=>$owners]);
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
        $task ->owner_id = $request->task_owner_id;
        $task ->description = $request->task_description;
        $task ->type_id = $request->task_type_id;
        $task ->start_date = $request->task_start_date;
        $task ->end_date = $request->task_end_date;
        $task ->logo = $request->task_logo;

        if($request->has('task_logo'))
        {
            $imageName = time().'.'.$request->task_logo->extension();
            $task->logo = '/images/'.$imageName;
            $request->task_logo->move(public_path('images'), $imageName);
        }

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

        $owners_count = $task->taskOwners->count();

        if($owners_count!=0) {
            return redirect()->route("task.index")->with('error_message','Istrinti negalima Task Owner egzistuoja');
        }
        $task->delete();
        return redirect()->route("task.index")->with('success_message','Task sekmingai istrintas, Valio!!!');
    }

    public function search(Request $request) {
        $search = $request->search;

        $tasks = Task::query()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);

        return view("task.search",['tasks'=> $tasks]);
    }

    public function filter(Request $request) {


        $type_id = $request->type_sort;

        // return $typeid;
        //
        // $tasks = Task::query()->where('type_id', $typeid)->paginate(5);
        $tasks = Task::sortable()->where('type_id', $type_id)->paginate(5);
        return view('task.filter', ['tasks'=>$tasks]);

    }

    public function generatePDF() {



        $tasks = Task::all();

        view()->share('tasks', $tasks);

        $pdf = PDF::loadView("task\pdf_template", $tasks);

        return $pdf->download("tasks.pdf");


        // return 0;
    }

    public function generateTaskPDF(Task $task) {

        view()->share('task', $task);


        $pdf = PDF::loadView("task\pdf_task_template", $task);

        return $pdf->download("task".$task->id.".pdf");


    }

    public function generatePDFAll() {

        $owners = Owner::all();
        $tasks = Task::all();
        $types = Type::all();

        view()->share(['tasks'=> $tasks,'types'=>$types, "owners"=>$owners]);

        $pdf = PDF::loadView("statistics");

        return $pdf->download("statistics.pdf");

    }
}
