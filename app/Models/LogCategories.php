<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogCategories extends Model
{
    use HasFactory;
    protected $table = 'log_categories';
    protected $guarded = ['id'];
    protected $with = ['user', 'target'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function target()
    {
        return $this->belongsTo(Category::class, 'target_id');
    }
}
