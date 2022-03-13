<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class forms extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='forms';
    protected $fillable = [
        'name'
    ];
    protected $dates = ['deleted_at'];
}
