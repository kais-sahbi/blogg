<?php

namespace App\Manager;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleManager

{
    public function construire(ArticleRequest $request, Article $articlee)
    {
        /* dd($request); */
        /* dd($request->all()); */
        $articlee->title = $request->input('titlee');
            $articlee->subtitle = $request->input('subtitlee');
            $articlee->content = $request->input('contentt');
            $articlee->category_id = $request->input('catt');//catt ta3 <select> fil vue
            $articlee->save(); //save en base
    }
}