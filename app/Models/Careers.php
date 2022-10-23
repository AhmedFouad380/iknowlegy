<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Careers extends Model
{
    use HasFactory;

    protected $appends = ['title','description','company'];


    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_title;
        } else {
            return $this->en_title;
        }
    }
    public function getCompanyAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_company;
        } else {
            return $this->en_company;
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


    public function City(){
        return $this->belongsTo(CareersCity::class ,'city_id');
    }
    public function Category(){
        return $this->belongsTo(CareersCategory::class ,'category_id');
    }
    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Careers') . '/' . $image;
        }
        return null;

    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Careers');
            $this->attributes['image'] = $imageFields;
        }
    }

}
