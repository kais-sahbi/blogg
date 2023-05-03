<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class Filters extends Component
{
    public $catego;//lies au catego dans le composoant @livewire
    public $activeFilters=[];
    public $search = '';

    public function render()
    {
        //array_filter prend le tableau filtrer et la fct d iteration (repition),rtourne la valeur, si la valeur est false degage lelement de tableau
        $this->activeFilters = array_filter($this->activeFilters,function ($val) {
            return $val!==false;
        });
        /*if(empty($this->search)){
    $articl=Article::all();
        }else{
    $articl =Article::where('title','like','%'.$this->search)->get();
           // dd($articl);
        }*/

        //Method1
          if(empty($this->activeFilters)){//si il n y p de filtre on va renvoyer tous leselemens
            $articl=Article::all();

        }else{//filter sur les categoris qu'on recoit(comparer au tableau)
            $articl=Article::whereIn('category_id',array_keys($this->activeFilters))->get();
        }


        return view('livewire.filters',[

            'articl' =>$articl
//Methode2
            /*   articl' => (empty($this->activeFilters))
            ? $articl=Article::all()
            : $articl=Article::whereIn('category_id',array_keys($this->activeFilters))->get()*/

            //'catego' => Category::all(),  on peut faire comme ca pour les categ ou bien passe les categ directement
            //dans le composant @livewire parce que categorie fixe mais les article plusieurs
        ]);
    }
}
