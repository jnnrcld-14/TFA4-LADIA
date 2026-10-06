<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index(): string
    {
        $today = date('Y-m-d');
        $tasks = (new TaskModel())
            ->where('task_date', $today)
            ->orderBy('status', 'ASC')
            ->orderBy('title', 'ASC')
            ->findAll();

        return view('home', ['tasks' => $tasks, 'today' => $today]);
    }
}
