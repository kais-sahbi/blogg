@extends('base')
@section('content')
admin rrr  
 
    <div class="container">
     {{--   @dump(Session::all())  --}}
  
        <h1 class="text-center mt-5">Liste des Articles</h1>
          <div class="d-flex justify-content-center">
               <a href="{{route('article.create')}}" class="btn btn-info my-3"> <i class="fas fa-plus mx-2"></i>Céer un article</a>
            
          </div>
        
        <table class="table table-hover row-clickable">
            <thead>
              <tr>
                <tr class="table-active">
                <th scope="col">ID</th>
                <th scope="col">Titre</th>
                <th scope="col">Date de création</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($articless as $article)
                        <tr >
                            <td ><a href="{{route('article', $article->slog)}}" style="text-decoration:none;color:black;">{{$article->id}}</a></td>
                            <td> <a href="{{route('article', $article->slog)}}" style="text-decoration:none;color:black;">{{$article->title}}</a></td>
                            {{-- <td>{{$article->created_at}}</td> --}}
                            {{-- <td>{{date('d-M-Y',strtotime($article->created_at))}}</td> --}}
                            <td>{{$article->dateformated()}}</td> {{-- on a acces à$article et tous ses fonctions  --}}
                            <td class="d-flex">
                                <a href="{{route('article.edit',$article->id)}}" class="btn btn-warning mx-3">Editer</a> {{-- mx3 marge sur les coter --}}
                                <button type="button"  class="btn btn-danger mx-3" onclick="document.getElementById('modal_open-{{$article->id}}').style.display='block'">Supprimer</button>
                                {{-- <a href="#" class="btn btn-danger mx-3">Supprimer</a> --}}
                                <form action="{{route('article.delete', $article->id)}}" method="POST">
                                  @csrf
                                  @method("DELETE") {{-- surchager/forcer avec la methode delete --}}

                                  {{-- modal de bootswatch pour la confirmation du sppression --}}
                                  <div class="modal" id="modal_open-{{$article->id}}">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Suppression</h5>
                                          <button type="button" class="btn-close" onclick="document.getElementById('modal_open-{{$article->id}}').style.display='none'" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Etes vous sure de supprimer cet article!!</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">oui</button>
                                          <button type="button" class="btn btn-secondary" onclick="document.getElementById('modal_open-{{$article->id}}').style.display='none'" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  

                                </form>
                            </td>
                        </tr>
                @endforeach
             
            </tbody>
          </table>
          {{-- pour la pagination --}}
          <div class="d-flex justify-content-center mt-5">
            {{$articless -> links('vendor.pagination.custom')}}
    </div>
        
    </div>
@endsection
