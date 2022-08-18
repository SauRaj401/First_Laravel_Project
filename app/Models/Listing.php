<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title','tags','company', 'location','email','website', 'description' ];

    public function scopeFilter($query, array $filters)
    {
        if($filters['tag'] ?? false){ //this thw statemenr is not false then move on
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false){ //this thw statemenr is not false then move on
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('tags', 'like', '%' . request('search') . '%')
            ;
        }
    }

   // Relationship To User
   public function user() {
    return $this->belongsTo(User::class, 'user_id');
}
}
