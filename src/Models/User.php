<?php

namespace Omerhan\Spanel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use omerhan\spanel\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role(){
        return $this->hasOne('Omerhan\Spanel\Models\Role','id','role_id');
    }

    public function checkRole($need_role){
        return (strtolower($need_role)==strtolower($this->have_role->name)) ? true : false;
    }

    public function hasRole($roles){
        $this->have_role = $this->role()->getResults();
        if (is_array($roles)){
            foreach ($roles as $key => $need_role){
                if($this->checkRole($need_role)){
                    return true;
                }
            }
        }else{
            return $this->checkRole($roles);
        }
    }


    public function yetki()
    {
        return Role::where('id', $this->role_id)->first()->name;
    }



}
