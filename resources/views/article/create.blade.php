@extends('base')
@section('content')
{{-- @dump($errors->all()) --}}
<div class="conatainer">
    <h1 class="text-center mt-5">Poster un article</h1>
    {{--  @dump($category)  --}}
<form method="POST" action="{{route('article.store')}}">{{-- envoyer ces elements du formulaire à la route store(ArticleController) --}}
        @csrf
        <div class="col-sm-10 offset-sm-1">
                <div class="form-group">
                    <label>Titre de l'article</label>
                    <input type="text" name="titlee" class="form-control @error('titlee') is-invalid @enderror" placeholder="Placer votre titre"/>{{--  is-invaled indique precisament les rules --}}
                    
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
                    <input type="text" name="subtitlee" class="form-control @error('subtitlee') is-invalid @enderror" placeholder="Sous-titre de l'article"/>
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
                            <option value="{{$categ->id}}">{{$categ->label}}</option>

                        @endforeach
                    </select>
                </div>
            </div>
        <div class="col-sm-10 offset-sm-1">
            <div class="form-group">
                <label>Contenu</label>
                <textarea id="tinycme-editor" name="contentt" class="form-control w-100 @error('contentt') is-invalid @enderror" placeholder="Placer votre titre"></textarea>
            
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

    <button type="submit" class="btn btn-dark">Poster l'article</button>
</div>
</form>

</div>

    
@endsection