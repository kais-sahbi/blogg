<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'category_id',
        
    ];
    public function dateformated()//personnalliser le format du date
    {
        return date_format($this->created_at,'d/m/Y'); //this reference à la classe Article calss courante
   
    }
public function category()

{
    return $this-> belongsTo(Category::class);//appartient à la class category
}
    //creation du dateformated est facultatif

    
}
