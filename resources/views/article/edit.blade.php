@extends('base')
@section('content')
{{-- @dump($errors->all()) --}}

<div class="conatainer">
    <h1 class="text-center mt-5">Editer cet article</h1>
<form method="POST" action="{{route('article.update', $artedit->id)}}">{{-- envoyer ces elements du formulaire à la route update(ArticleController) --}}
    @method("PUT")    
    @csrf
        <div class="col-sm-10 offset-sm-1">
                <div class="form-group">
                    <label>Titre de l'article</label>{{-- attribut value seulment on modifciation pour recuperer les valeurs --}}
                    <input type="text" value="{{$artedit->title}}" name="titlee" class="form-control @error('titlee') is-invalid @enderror" placeholder="Placer votre titre"/>{{--  is-invaled indique precisament les rules --}}
                    
                    @error('titlee')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>  
                    @enderror

                </div>
        </div>
            <div class="col-sm-10 offset-sm-1 ">
                <div class="form-group">
                    <label>SOUS-Titre</label>
                    <input type="text" value="{{$artedit->subtitle}}" name="subtitlee" class="form-control @error('subtitlee') is-invalid @enderror" placeholder="Sous-titre de l'article"/>
                    <small class="form-text text-muted">Contenu de l'article</small>

                    @error('subtitlee')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>  
                    @enderror
                </div>
            </div>
            <div class="col-sm-10 offset-sm-1">
                <div class="form-group">
                    <label for="catt">Catégories</label>
                    <select  name="catt" class="form-select">

                        @foreach ($categories as $categ)
                        {{-- <option value="{{$categ->id}}" kif namlou inspect ala select nalgou les id taahom --}}
                            
                            <option value="{{$categ->id}}"  {{$categ->id === $artedit->category->id ? 'selected' : ''}}>{{$categ->label}}</option>

                            {{-- {{$categ->id===$artedit->categ->id ? 'selected' : ''}}   si oui "?"  slectionne moi :categ id = id de categ de article --}}
                        @endforeach
                    </select>
                </div>
            </div>
        <div class="col-sm-10 offset-sm-1">
            <div class="form-group">
                <label>Contenu</label>
                <textarea id="tinycme-editor"  name="contentt" class="form-control w-100 @error('contentt') is-invalid @enderror" placeholder="Placer votre titre">
                    {{$artedit->content}}
                </textarea>
            
                    @error('contentt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>  
                    @enderror
            </div>
            <script>
                tinymce.init({
                  selector: '#tinycme-editor'
                });
              </script>
        </div>
<div class="d-flex justify-content-center mb-5">

    <button type="submit" class="btn btn-dark">Modifer l'article</button>
</div>
</form>

</div>

    
@endsection