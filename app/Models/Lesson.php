<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Owenoj\LaravelGetId3\GetId3;

class Lesson extends Model
{
    use HasFactory;

    protected $appends = ['title','description','lenght'];


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
            return $this->ar_title;
        } else {
            return $this->en_title;
        }
    }
    public function getLenghtAttribute()
    {

    }
    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/LessonImg') . '/' . $image;
        }
        return null;

    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'LessonImg');
            $this->attributes['image'] = $imageFields;
        }
    }
    public function getVideoAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/LessonVideos') . '/' . $image;
        }
        return null;

    }

    public function setVideoAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'LessonVideos');
            $this->attributes['video'] = $imageFields;
        }
    }
    public function  Course(){
        return $this->belongsTo(Course::class ,'course_id');
    }

    public function  CreatedBy(){
        return $this->belongsTo(Admin::class ,'created_by');
    }
    public function  UpdatedBy(){
        return $this->belongsTo(Admin::class ,'created_by');
    }


}
