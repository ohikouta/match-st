<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MembershipRequest extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'individuals_id',
        'status',
        ];
        
    // usersテーブルとの紐づけ
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
