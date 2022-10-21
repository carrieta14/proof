<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'departament',
    ];

    protected $searchableFields = ['*'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
