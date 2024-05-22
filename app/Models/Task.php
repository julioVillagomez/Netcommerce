<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $fillable = ['name','description','user_id','company_id','is_completed','start_at','expired_at'];


    protected $casts = [
        'start_at' => 'datetime',
        'expired_at' => 'datetime',
        'is_completed' => 'bool',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
