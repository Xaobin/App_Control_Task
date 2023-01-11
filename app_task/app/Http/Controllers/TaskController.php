<?php
/*
Adricanno Jumalis
jum@me.com
nekoneko002
*/
namespace App\Http\Controllers;

use Mail;
use App\Mail\NewTaskMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TasksExport;

class TaskController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $email = auth()->user()->email;

       // return "ID: $id | Nome: $name | Email: $email";
       $user_id = auth()->user()->id;
        $tasks = Task::where('user_id', $user_id)->paginate(10);
        return view('task.index', ['tasks' => $tasks]);

        /*
        if(Auth::check()) {
            $id = Auth::user()->id;
            $name = Auth::user()->name;
            $email = Auth::user()->email;

            return "ID: $id | Nome: $name | Email: $email";
        } else {
            return 'Você não está logado no sistema';
        }

        
        if(auth()->check()) {
            $id = auth()->user()->id;
            $name = auth()->user()->name;
            $email = auth()->user()->email;

            return "ID: $id | Nome: $name | Email: $email";
        } else {
            return 'Você não está logado no sistema';
        }
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all('task', 'date_limit_conclusion');
        $datas['user_id'] = auth()->user()->id;
        
        $task = Task::create($datas);

        $recipient = auth()->user()->email; //e-mail do usuário logado (autenticado)
        Mail::to($recipient)->send(new NewTaskMail($task));

        return redirect()->route('task.show', ['task' => $task->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $user_id = auth()->user()->id;

        if($task->user_id == $user_id) {
            return view('task.edit', ['task' => $task]);
        }

        return view('access-denied');
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
        if(!$task->user_id == auth()->user()->id) {
            return view('access-denied');
        }

        $task->update($request->all());
        return redirect()->route('task.show', ['task' => $task->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if(!$task->user_id == auth()->user()->id) {
            return view('access-denied');
        }
        $task->delete();
        return redirect()->route('task.index');
    }

    public function exportation($extensao) {
        //return Excel::download(new TasksExport, 'List_of_Tasks.xlsx');
        if(in_array($extensao, ['xlsx', 'csv', 'pdf'])) {
            return Excel::download(new TasksExport, 'List_Of_Tasks.'.$extensao);
        }
        
        return redirect()->route('task.index');
    }
    public function exporter() {
        //$task = auth()->user()->task()->get();
       // $pdf = PDF::loadView('task.pdf', ['tasks' => $tasks]);

        //$pdf->setPaper('a4', 'landscape');
        //tipo de papel: a4, letter
        //orientação: landscape (paisagem), portrait (retrato)


        //return $pdf->download('lista_de_tarefas.pdf');
        //return $pdf->stream('list_of_tasks.pdf');
    }
    public function logoutme(){
        session_start();
        //echo $_SESSION['name'];
       session_destroy();
       setcookie('key', '', time() - 3600, '/');
       return view('welcome');
    }
}
