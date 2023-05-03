<?php

namespace App\Http\Controllers;
//pour linviter
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //public $search = '4';
    public function home(){
        return view('home');
    }
    public function index(){
        /*$art= Article::paginate(4);

        return view('articles',
            ['articl' => $art]);*/

        return view('articles',
            [
                'articl' => Article::paginate(4),
                'catego' => Category::all(),
                //'catego'=> Category::where('id', $this->search)->get(),

            ]);


    }
   // Methode 1:
  /*   public function show($slug){
        $art= Article::where("slog",$slug)->firstOrFail();//first return null

        return view('article',['articll' => $art]);
    } */

      // Methode 2: route binding

        public function show(Article $art)//article injecté
        {


        return view('article',['articll' => $art]);
        }

}
