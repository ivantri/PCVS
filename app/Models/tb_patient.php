<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_patient extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(tb_user::class,'user_id');
    }

    public function vaccinations(){
        return $this->hasMany(tb_vaccinations::class,"patient_id");
    }
}
