<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['task_id', 'selesai_pada', 'catatan'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}

