<?php

namespace App\Observers;

use App\Models\Article;
use Cocur\Slugify\Slugify;
use Illuminate\Support\Str;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        //nous calculons les slog des titre
        //un observateur regrupe tous les auditeurs/ecouteturs d un modele dans 1 seul class
         
        //methode 1:
        /*
         $instance = new Slugify();//transfomer une chaine de cartrcter en slug
         $article->slog=$instance->slugify($article->title);//slog exist ds le bd
         $article->save();
         */

        //methode 2:
         $article->slog = Str::slug($article->title, '-');
         $article->save();
    }

    /**
     * Handle the Article "updated" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        
        $article->slog = Str::slug($article->title, '-');
        //$article->save(); déclencher la methode/levenement  à l infinie
         $article->saveQuietly();
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //
    }
}
