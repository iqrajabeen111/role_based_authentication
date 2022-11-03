<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }




    public function userrr()
    {
        return $this->hasMany(User::class, 'id','role_id');
    }


    // public function isAdmin($role)
    // {
    //     $check = User::with('roles')->whereHas('roles', function ($query) use ($role){
    //         $query->where('name','=', $role);
    //     })->first();



    //     if ($check->roles->name== 'Admin') {
    //         return true;
    //     }

    //     return false;
    // }

    public function hasRole($role)
    {
        $user = Auth::user();
        $role_id=$user->role_id;
        $check = User::with('roles')->whereHas('roles', function ($query)  use ($role_id) {
                    $query->where('id', $role_id);
                })->first();
        // $check = User::with('roles')->where('role_id','=',$user->role_id);
        // dd()
        return $check->roles->name;
        // $categories = Roles::whereHas('User');
        // dd( $categories);
    }
}
