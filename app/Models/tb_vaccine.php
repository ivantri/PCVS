<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_vaccine extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function batch(){
        return $this->hasMany(tb_batch::class,'vaccine_id');
    }
}
