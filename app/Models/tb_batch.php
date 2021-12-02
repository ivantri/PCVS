<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_batch extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function vaccine(){
        return $this->belongsTo(tb_vaccine::class,'vaccine_id');
    }
    public function appointments(){
        return $this->hasMany(tb_vaccination::class,'batch_id');
    }
}
