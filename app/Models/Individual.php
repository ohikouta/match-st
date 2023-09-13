<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'summary',
        'category',
        'admin_id',
        'image',
        ];
}
