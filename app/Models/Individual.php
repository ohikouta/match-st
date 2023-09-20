<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

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
        
    public function getPaginateByLimit(int $limit_count=5)
    {
        return $this->orderby('updated_at', 'DESC')->paginate($limit_count);
    }
}
