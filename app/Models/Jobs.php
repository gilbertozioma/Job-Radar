<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'company', 'location', 'website', 'email', 'description', 'tags', 'logo'];

    public function scopeFilter($query, array $filters){
        // ?? Null Coalescing operator
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('tags', 'like', '%' . request('search') . '%')
            ;
        }
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}


// php artisan tinker
// \App\Models\Jobs::first()
// \App\Models\Jobs::find(3)
// \App\Models\Jobs::find(3)->user
// $user = \App\Models\User::first
// $user
// $user->jobs