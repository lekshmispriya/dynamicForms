<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class form_contents extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='form_contents';
    protected $fillable = [
        'f_id','label','type','custom_values'
    ];
    protected $dates = ['deleted_at'];
}
