<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSensor extends Model
{
    use HasFactory;

    public $table = "data_sensor";
    protected $casts = [
        'created_at' => 'date:m/d/Y H:i:s',
        'updated_at' => 'date:m/d/Y H:i:s',
    ];
    public $fillable = [
        "co",
        "nh3",
        "no2"
    ];
}
