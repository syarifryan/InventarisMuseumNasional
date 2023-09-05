<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    use HasFactory;
    protected $table = "proses";
    protected $casts = [
        'created_at' => 'date:m/d/Y H:i:s',
        'updated_at' => 'date:m/d/Y H:i:s',
    ];
    protected $fillable = [
        "id",
        "co",
        "nh3",
        "no2",
        "defuzzy",
        "grade",
        "handle_id",
    ];

    public function handle()
    {
        return $this->belongsTo(Handle::class, 'handle_id');
    }

}
