<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category',
        'explanation',
        'image_path',
        ];
        
    public function getDataSomehow()
    {
        // 適切なデータ取得ロジックを実装
        return Community::all(); // 例: すべてのコミュニティを取得する場合
    }
    
    
}
