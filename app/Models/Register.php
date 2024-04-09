<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    // karena nama tabel tidak sesuai dengan konvensi laravel
    protected $table = 'user';
    // karena primary key namanya bukan id
    protected $primaryKey = 'UserID';
    public $timestamps = false;

    protected $guarded = ['UserID'];
    protected $hidden = ['Password'];

    public function getAuthPassword()
    {
        return $this->Password;
    }
}
