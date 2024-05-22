<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyRepository extends BaseRepository{

    function __construct( array $relations = [])
    {
        parent::__construct(new Company(),$relations);
    }

    public function filterCompany(Request $request){
        if(empty($this->relations)){
            return $this->model->filter($request)->get();
        }
        return $this->model->filter($request)->with($this->relations)->get();
    }

}
