<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'name',           
        'description'
    ];


    /* 
    * Get Permissions
    */
    public function permissions()
    {
        return $this->belongsToMany("App\Models\Permission");
    }

    /* 
    * Permission not linked with this profile
    */
    public function permissionsAvailable($filter = null)
    {
        //id do perfil
        //$this->id;
        $permissions = Permission::whereNotIn('permissions.id', function($query){
            $query->select('permission_profile.permission_id as id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
            if($filter)
            $queryFilter->where("permissions.name", 'LIKE', "%{$filter}%");
        })
        ->paginate(10);
                                    

        return $permissions;
    }


    /* 
    * Get Plans
    */
    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }
}
