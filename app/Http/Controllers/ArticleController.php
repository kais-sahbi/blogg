<?php

namespace App\Http\Controllers;
//page pour l admin
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Manager\ArticleManager;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller //le controlleur qui va gerer les articles(ajouter..)
{

    //pour acceder à la class l'article manager et la fct construire; il faut injecter à la constructeur de l'articlcontroller

                    private $articleManager;
                    public function __construct(ArticleManager $artManager)

                {
                    $this->articleManager = $artManager;

                }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//show admin
    {
        //Récuperer tous les articles
        $art= Article::paginate(10);
        //on passe dans la vue
       return view('article.index',['articless'=>$art]);
         //page qui va lister tous les articles ,passer les articles à la vue (il sera $articless)



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //on va passer àla view create toutes les categories recuperer de labase

        return view('article.create',[
            'categories'=> Category::all()

        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */

    //cette fct(store) prend en parametre la requete qui va nous permttre de récuperer les elemets envoyer par le formulaire
    public function store(ArticleRequest $requet)//on change la Request injecter dans la store par:ArticleRequest pour la validation des donner
    {
        $validated = $requet->validated();//si la requete n est p valider il ya erreur sur un champ(on veut valider ou nn les donner avent de )

        //recuperer les parametres envoyer par le requete
       // dd($request->all());

       /* Article::create([
        'title'=>$request->input('titlee'),
        'subtitle'=>$request->input('subtitlee'),
        'content'=>$request->input('contentt'),


       ]); */
        $this->articleManager->construire($requet, new Article());
       return redirect()->route('article.index')->with('success',"l'article est bien sauvgardé");
    }//->with('success',"l'article est bien sauvgardé") flahs d un msg de succes



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //afficher le formulaire d'edition d'article


            return view('article.edit',
            [
                'artedit' => $article, //passer l article à la vue (il sera $artedit)
                'categories'=> Category::all()
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $requete, Article $article)
    {
        //apporter les modifications en base


            //dd($article);

            /* $article->title = $request->input('titlee');
            $article->subtitle = $request->input('subtitlee');
            $article->content = $request->input('contentt');
            $article->save(); //save en base */

            //dd($this->articleManager);
            //dd(get_class($this->articleManager));
            //dd(get_class_methods($this->articleManager));
            $this->articleManager->construire($requete, $article);
            return redirect()->route('article.index')->with('success',"l'article est bien modifié");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete(Article $deletArt)
    {
        //dd($deletArt);

        $deletArt->delete();
        return redirect()->route('article.index')->with('success',"l'article supprimé!!");
    }
}
