<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public function getLogoAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Setting') . '/' . $image;
        }
        return null;

    }

    public function setLogoAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Setting');
            $this->attributes['logo'] = $imageFields;
        }
    }
}
