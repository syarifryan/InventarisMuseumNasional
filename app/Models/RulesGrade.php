<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RulesGrade extends Model
{
    use HasFactory;
    protected $table = "rules_grade";
    protected $fillable = [
        'id',
        'proses_id',
        'rules_id',
        "co",
        "nh3",
        "no2",
        'grade',
        'nilai_min'
    ];

    public function rules(){
        return $this->belongsTo(Rules::class, 'rules_id');
    }

    //nilai min
    public function nilaiMin()
    {
        return $this->hasMany(NilaiMin::class, 'rules_grade_id');
    }

    public function proses()
    {
        return $this->belongsTo(Proses::class, 'proses_id');
    }

   
}
