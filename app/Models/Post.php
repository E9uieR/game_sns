<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    

        function getPaginateByLimit(int $limit_count = 5)
        {
            return $this::with('category','game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        }
        
        protected $fillable = [
            'title',
            'body' ,
            'category_id',
            'game_id'
        ];
        
        public function category()
        {
            return $this->belongsTo(Category::class);
        }
        
        public function game()
        {
            return $this->belongsTo(Game::class);
        }
        
        
        public function posts()
        {
            return $this->belongsToMany(User::class);
        }
}
