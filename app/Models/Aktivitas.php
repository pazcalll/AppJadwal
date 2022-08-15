<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aktivitas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'aktivitas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'aktivitas', 'mulai', 'selesai', 'id_metode', 'created_at', 'updated_at', 'deleted_at'
    ];
}
