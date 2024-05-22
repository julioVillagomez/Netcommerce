<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TaskRequest;
use App\Http\Resources\Api\TaskStoreResource;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskRepository;
    function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    public function store(TaskRequest $request){
        $task = $this->taskRepository->saveLoadRelation(new Task($request->all()),['user','company']);

        return TaskStoreResource::make($task)->additional(['error' => false]);
    }
}
