<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Individual;

class Notification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 
        'message', 
        'read', 
        'sender_id'
        ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    
    public function individual()
    {
        return $this->belongsTo(Individual::class, 'individual_id');
    }
}
