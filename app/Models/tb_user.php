<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_user extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function patient(){
        return $this->hasOne(tb_patient::class,'user_id');
    }
    public function admin(){
        return $this->hasOne(tb_admin::class,'user_id');
    }
}
