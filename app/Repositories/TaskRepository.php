<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends BaseRepository{

    function __construct( array $relations = [])
    {
        parent::__construct(new Task(),$relations);
    }

    public function saveLoadRelation(Task $model,$relations): ?Task{
        $model->save();
        return $model->load($relations);
    }



}
