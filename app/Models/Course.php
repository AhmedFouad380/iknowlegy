<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Course extends Model
{
    use HasFactory;
    protected $appends = ['title','description','long_description'];


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
    public function getLongDescriptionAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_long_description;
        } else {
            return $this->en_long_description;
        }
    }



    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Category') . '/' . $image;
        }
        return null;

    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Category');
            $this->attributes['image'] = $imageFields;
        }
    }
    public function  CreatedBy(){
        return $this->belongsTo(Admin::class ,'created_by');
    }
    public function  MainCategory(){
        return $this->belongsTo(Category::class ,'main_category_id');
    }

    public function  SubCategory(){
        return $this->belongsTo(SubCategory::class ,'sub_category_id');
    }

        public function  Instructor(){
        return $this->belongsTo(Instructor::class ,'instructor_id');
    }

    public function  UpdatedBy(){
        return $this->belongsTo(Admin::class ,'created_by');
    }
    public function  Lessons(){
        return $this->HasMany(Lesson::class ,'course_id');
    }
    public function Enrollment(){
        return $this->hasMany(Enrollment::class,'course_id');
    }
    public function WithListCheck(){
        return $this->HasOne(Wishlist::class , 'course_id')->
        where('user_id',Auth::guard('web')->id())->withDefault([
            'user_id'=>0,
        ]);
    }
}
