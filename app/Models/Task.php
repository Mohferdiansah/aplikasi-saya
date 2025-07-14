<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['nama', 'kategori', 'waktu', 'xp', 'status', 'catatan'];

    public function histories()
    {
        return $this->hasMany(History::class);
    }
}

