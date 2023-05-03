<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       /* $cat=['Sport','IT','Science','Phys'];


        for($i = 0;$i<count($cat); $i++) {
            //assignement de masse il faut ajouter  label à la fillable de la category
       Category::create([
                            //nasn3ou label n7otou fih les categorie courantete
                            'label'=>$cat[$i]
                           ]);
        } */



        // M 2 :on peut faire avec faker 
        \App\Models\Category::factory(5)->create();// le seeder va charger 5 categorie
    }
}
