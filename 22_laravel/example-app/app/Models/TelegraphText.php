<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class TelegraphText extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [

        'text',
        'title',
        'author',
        'slug',
    ];

    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
