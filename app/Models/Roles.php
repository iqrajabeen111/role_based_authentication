<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
       
    ];


     public function users()
    {
        return $this->hasMany(User::class,'role_id');
    }
     public function userrr()
    {
        return $this->belongsTo(User::class,'role_id');
    }

}