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
                'planned_date' => Carbon::now()->subHours(3)->roundHours(),
                'completed' => false
            ],
            [
                'title' => 'Task 2',
                'description' => 'Description of Task 2',
                'planned_date' => Carbon::now()->addDays(2)->roundHours(),
                'completed' => false
            ],
            [
                'title' => 'Task 3',
                'description' => 'Description of Task 3',
                'planned_date' => Carbon::now()->addDays(4)->roundHours(),
                'completed' => false
            ]
        ];

        foreach($tasks as $task) {
            \App\Models\Task::create($task);
        }
    }
}
