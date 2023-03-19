<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // Make model fields writable by submit form 
    protected $fillable = [
        'title', 
        'user_id',
        'company', 
        'location', 
        'email', 
        'website', 
        'logo',
        'tags', 
        'description'];

    // see https://laravel.com/docs/5.0/eloquent#query-scopes
    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {     
            return $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if($filters['search'] ?? false) {     
            return $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    
    // Relationship to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
