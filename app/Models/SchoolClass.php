<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Children;

class SchoolClass extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function childrens()
    {
        return $this->hasMany(Children::class,'class_id','id');
    }

    public function occupliedChildrens()
    {
        return Children::where(['class_id' => $this->id,'status' => 1])->count();
    }

    public function requestChildrens()
    {
        return Children::where(['class_id' => $this->id,'status' => 2])->count();
    }

}

