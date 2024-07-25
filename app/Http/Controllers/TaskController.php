<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {   
        $tasks = Task::all();

        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'planned_date' => 'date|nullable',
            'completed' => 'boolean'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->failed()) {
            return response()->json($validator->errors(), 400);
        }

        $task = Task::create($validator->validated());

        return response()->json($task, 201);
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }

    public function update(Request $request, Task $task)
    {
        $rules = [
            'title' => 'string|max:100',
            'description' => 'string',
            'planned_date' => 'date|nullable',
            'completed' => 'boolean'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->failed()) {
            return response()->json($validator->errors(), 400);
        }

        $task->update($validator->validated());

        return response()->json($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
