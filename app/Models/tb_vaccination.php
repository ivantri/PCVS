<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_vaccination extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    
    public function patient(){
        return $this->belongsTo(tb_patient::class,'patient_id');
    }
    public function batch(){
        return $this->belongsTo(tb_batch::class,'batch_id');
    }
}
