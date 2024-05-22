<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function tasks(){
        return $this->hasMany(Task::class);
    }


    public function scopeFilter(Builder $query,Request $request)
    {
        if($request->filled('name')){
            $query->where('name','like',"%$request->name%");
        }
    }
}
