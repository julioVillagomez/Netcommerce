<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository{

    function __construct( array $relations = [])
    {
        parent::__construct(new User(),$relations);
    }

    public function pending_task(int $user_id){
        return $this->model->with(['tasks' => function($q){
            $q->where('is_completed',0);
        }])->where('id',$user_id)->first();
    }

}
