<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'semester',
        'career',
    ];

    protected $searchableFields = ['*'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
