<?php

namespace App\Models;

use App\Models\Academic;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ["name","age","address"];
    use HasFactory;
    
    public function academic(){
        return $this->hasOne(Academic::class, 'student_id', 'id');
    }

    public function country(){
        return $this->hasOne(Country::class, 'student_id', 'id');
    }
}
