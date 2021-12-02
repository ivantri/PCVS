<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_healthcare extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function admin(){
        return $this->hasMany(tb_admin::class,'healthcare_id');
    }
    public function batches(){
        return $this->hasMany(tb_batch::class,'healthcare_id');
    }
}
