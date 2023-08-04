<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'univ',
        ];
        
    public function getPaginateByLimit(int $limit_count=5)
    {
        return $this->orderby('updated_at', 'DESC')->paginate($limit_count);
    }
}
