<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'link',
        'img',
        'type_id'
    ]; 

    protected $appends = ['img_path'];

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }

    public function getImgPathAttribute() {
        $imgPath = null;
        if($this->img) {
            $imgPath = asset('storage/'.$this->img);
        }
        return $imgPath;
    }
}
