<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_details',
        'project_remark',
        'project_status',
        'wedding_date',
        'cust_id'
    ];
    public $timestamps = false;

    public function cust()
    {
        return $this->belongsTo(User::class, 'cust_id', 'id');
    }

    public function projectServices()
    {
        return $this->hasMany(ProjectService::class, 'project_id', 'id');
    }
}
