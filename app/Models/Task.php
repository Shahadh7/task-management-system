<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'project_id',
        'assigned_to',
        'deadline',
        'status_id',
        'priority_id',
        'created_by',
    ];


    public function project()
    {
        return $this->belongsTo(Project::class, 'id','project_id');
    }


    public function status()
    {
        return $this->hasOne(Status::class, 'id','status_id');
    }


    public function priority()
    {
        return $this->hasOne(Priority::class, 'id','priority_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id','assigned_to');
    }

}
