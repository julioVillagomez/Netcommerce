<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyRequest;
use App\Http\Resources\Api\CompanyResource;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
   private $companyRepository;

    function __construct( )
    {
        $this->companyRepository = new CompanyRepository(['tasks.user']);
    }


    public function index(Request $request){
        $companies = $this->companyRepository->filterCompany($request);
        return CompanyResource::collection($companies)->additional(['error' => false]);
    }

    public function store(CompanyRequest $request){
        $this->companyRepository->save(new Company($request->all()));

        return response()->success('Se ha guardado correctamente');
    }


}
