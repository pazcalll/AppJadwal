<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metode extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table= 'metode';
    protected $primaryKey = 'id';
    protected $fillable = [
        'metode', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function aktivitas() {
        return $this->hasMany(Aktivitas::class, 'id_metode');
    }
}
