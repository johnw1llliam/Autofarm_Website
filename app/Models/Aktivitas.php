<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;

    // karena nama tabel tidak sesuai dengan konvensi laravel
    protected $table = 'aktivitas';
    // karena primary key namanya bukan id
    protected $primaryKey = 'AktivitasID';
    public $timestamps = false;

    public function aktivitas() {
        return $this->hasMany(Aktivitas::class, 'AktivitasID');
    }
}
