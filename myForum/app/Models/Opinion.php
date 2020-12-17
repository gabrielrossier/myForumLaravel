<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    public $timestamp = false;

    use HasFactory;

    public function references()
    {
        return $this->belongsToMany(Reference::class);
    }
}
