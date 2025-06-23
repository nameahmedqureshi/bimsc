<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'title',
        'project_limit',
        'task_limit_per_project',
        'price',
    ];
}
