<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Api extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'apis';
    protected $primaryKey = 'api_id';
    protected $fillable = [
        'api_url','api_type'
    ];
}
