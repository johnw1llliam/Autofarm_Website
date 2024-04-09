<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandang extends Model
{
    use HasFactory;

    // karena nama tabel tidak sesuai dengan konvensi laravel
    protected $table = 'kandang';
    // karena primary key namanya bukan id
    protected $primaryKey = 'KandangID';
    public $timestamps = false;

    public function kandang() {
        return $this->hasMany(Kandang::class, 'KandangID');
    }
}
