<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'tasks';
    protected $primaryKey = 'task_id';
    protected $fillable = [
        'task_name','task_level'
    ];
    protected $dates = [
        'deleted_at','created_at','updated_at'
    ];
}
