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
            'title' => 'string|max:100',
            'description' => 'string',
            'due_date' => 'date|nullable',
            'timeslot_id' => 'integer|nullable',
            'completed' => 'boolean'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->failed()) {
            return response()->json($validator->errors(), 400);
        }

        if (isset($request->due_date) && $validator->validated()['due_date'] && $validator->validated()['timeslot_id']) {
            $existingTask = Task::where('due_date', $validator->validated()['due_date'])
                ->where('timeslot_id', $validator->validated()['timeslot_id'])
                ->first();

            if($existingTask){
                return response()->json(['error' => 'A task with the same date and timeslot already exists.'], 400);
            }
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
            'due_date' => 'date|nullable',
            'timeslot_id' => 'integer|nullable',
            'completed' => 'boolean'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->failed()) {
            return response()->json($validator->errors(), 400);
        }

        if (isset($request->due_date) && $validator->validated()['due_date'] && $validator->validated()['timeslot_id']) {
            $existingTask = Task::where('due_date', $validator->validated()['due_date'])
                ->where('timeslot_id', $validator->validated()['timeslot_id'])
                ->first();

            if ($existingTask && $existingTask->id !== $task->id) {
                return response()->json(['error' => 'A task with the same date and timeslot already exists.'], 400);
            }
        }

        $task->update($validator->validated());

        return response()->json($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json('successfully deleted', 200);
    }
}
