<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = ["name", "description"];

    public function profiles()
    {
        //return $this->belongsToMany(Profile::class);
        return $this->belongsToMany("App\Models\Profile");
    }
}
