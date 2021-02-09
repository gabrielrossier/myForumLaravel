<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;
    public $timestamp = false;

    public function opinions()
    {
        return $this->belongsToMany(Opinion::class);
    }


}
