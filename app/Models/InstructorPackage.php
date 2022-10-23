<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class InstructorPackage extends Model
{
    use HasFactory;

    protected $appends = ['title','description'];


    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_title;
        } else {
            return $this->en_title;
        }
    }

    public function getDescriptionAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_description;
        } else {
            return $this->en_description;
        }
    }
    public function  CreatedBy(){
        return $this->belongsTo(Admin::class ,'created_by');
    }
    public function  UpdatedBy(){
        return $this->belongsTo(Admin::class ,'created_by');
    }

}
