<?php

namespace App\Http\Controllers;

use App\Models\Task; // used for calling the model task
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function ShowAllTasks()
    {
        $getTasks = Task::all();
        return view('index', ['getTasks' => $getTasks]);
    }
    public function AddTasks(Request $request)
    {
        $request->validate([
            'taskName' => 'required',
        ]);
        Task::create([
            'taskName' => $request->input('taskName'),
        ]);
        return redirect('/')->with('success', 'Task Added successfully.');
    }
    public function DeleteTask($taskId)
    {
        Task::where('taskId', $taskId)->delete();
        return redirect('/')->with('success', 'Task is successfully deleted');
    }

    public function EditTask($taskId)
    {
        $task = Task::find($taskId);
        return response()->json(
            ['task' => $task]
        );
    }
    public function UpdateTask(Request $request)
    {
        $taskId = $request->input('taskId');
        $task = Task::find($taskId);
        $request->validate([
            'taskName' => 'required',
        ]);
           $task->update([
                'taskName' => $request->input('taskName'),
            ]);
            return redirect('/')->with('success', 'Task is successfully updated');
    }

}
