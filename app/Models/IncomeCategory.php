<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model
{
    use HasFactory;

    public function creatorInfo(){
       return $this->belongsTo('App\Models\user','incate_creator','id');
    }
    
    public function editorInfo(){
       return $this->belongsTo('App\Models\user','incate_editor','id');
    }
}
