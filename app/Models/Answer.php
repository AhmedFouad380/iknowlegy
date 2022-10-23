<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function User(){

        return $this->belongsTo(User::class ,'user_id');

    }

    public function Question(){

        return $this->belongsTo(Questions::class ,'question_id');

    }
}
