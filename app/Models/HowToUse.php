<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowToUse extends Model
{
    use HasFactory;

    public function getVideoAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/HowToUse') . '/' . $image;
        }
        return null;

    }

    public function setVideoAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'HowToUse');
            $this->attributes['video'] = $imageFields;
        }
    }
    public function  CreatedBy(){
        return $this->belongsTo(Admin::class ,'created_by');
    }
    public function  UpdatedBy(){
        return $this->belongsTo(Admin::class ,'created_by');
    }
}
