<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use App\Models\User;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'summary',
        'event_date',
        'admin_id',
        'address',
        ];
        
    public function getPaginateByLimit(int $limit_count=5)
    {
        return $this->orderby('updated_at', 'DESC')->paginate($limit_count);
    }
    
    // Event.php モデル
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
