<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'title' => 'Task 1',
                'description' => 'Description of Task 1',
                'due_date' => Carbon::now(),
                'timeslot_id' => 1,
                'completed' => false
            ],
            [
                'title' => 'Task 2',
                'description' => 'Description of Task 2',
                'due_date' => Carbon::now()->addDays(2),
                'timeslot_id' => 2,
                'completed' => false
            ],
            [
                'title' => 'Task 3',
                'description' => 'Description of Task 3',
                'due_date' => null,
                'completed' => false
            ]
        ];

        foreach($tasks as $task) {
            \App\Models\Task::create($task);
        }
    }
}
