<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'company', 'location', 'website', 'email', 'description', 'tags', 'logo'];

    // The scopeFilter method allows you to filter the query based on certain criteria.
    public function scopeFilter($query, array $filters)
    {
        // Null Coalescing operator (??) is used to check if the 'tag' key is present in the $filters array.
        if ($filters['tag'] ?? false) {
            // The query will search for records where the 'tags' column contains the specified tag.
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        // Null Coalescing operator (??) is used to check if the 'search' key is present in the $filters array.
        if ($filters['search'] ?? false) {
            // The query will search for records where the 'title', 'description', or 'tags' column contains the specified search term.
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // The Jobs model belongs to a User model. The 'user_id' column is used as the foreign key.
    public function user()
    {
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