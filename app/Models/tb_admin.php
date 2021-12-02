<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_admin extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(tb_user::class,'user_id');
    }
    public function healthcare(){
        return $this->belongsTo(tb_healthcare::class,'healthcare_id');
    }
}
