<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'label'
    ];

public function articles() // 1 categorie peut etre liée à plusieurs  articles
{
    return $this->hasMany(Article::class);

}
}