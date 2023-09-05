<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    use HasFactory;
    protected $table = "rules";
    protected $fillable = [
        "id",
        "co",
        "no2",
        "nh3",
        "grade",
    ];

    public function rulesGrade()
    {
        return $this->hasMany(RulesGrade::class, 'rules_id');
    }

}
