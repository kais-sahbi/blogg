<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    /*     $faker = Factory::create();


     for($i = 0;$i<26; $i++) {
    Article::create([
                         'title' => $faker->sentence(),
                         'subtitle' => $faker->sentence(),
                         'content' => $faker->text($maxNbChars = 200),
                         // recuprer une categori au hasard par l id
                         'category_id' => Category::inRandomOrder()-> first()->id
                        ]);
                    }

                        */

                        //M2
                        
                       /* test
                        $cat=Category::get();
                        dd($cat); */
Category::get()->each(function($cat){//iterer avec la fct each, pour chaque category on va faire appel à factory
    \App\Models\Article::factory(5)->create([//5 article par categorie
        'category_id'=>$cat->id
    ]);

});




     }
                       
     
                        
    
}
